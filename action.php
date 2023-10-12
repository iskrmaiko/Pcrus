<?php
require 'config.php';

function generateStarIcons($starCount) {
    $starIcons = '';
    for ($i = 0; $i < $starCount; $i++) {
        $starIcons .= '<i class="fas fa-star" style="color: orange;"></i>'; 
    }
    return $starIcons;
}


if (isset($_POST['action'])) {
    if ($_POST['action'] === 'view_details' && isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        $sql = "SELECT * FROM products WHERE product_id = $product_id";
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();

        $sql_reviews = "SELECT * FROM product_reviews WHERE product_id = $product_id";
        $result_reviews = $conn->query($sql_reviews);

        if ($product) {
            $output = '
                    <div class="col-lg-4">
                        <div class="card border-secondary">
                            <img src="' . $product['product_image'] . '" class="card-img-top product-image" alt="">
                            <div class="card-body">
                                <h4 class="card-title">' . $product['product_name'] . '</h4>
                                <h4 class="card-title text-danger">Price: ' . $product['product_price'] . '/-</h4>
                                <p>
                                    RAM: ' . $product['ram'] . ' <br>
                                    HDD: ' . $product['hdd'] . ' <br>
                                    Processor: ' . $product['processor'] . ' <br>
                                    Screen Size: ' . $product['screen_size'] . ' <br>
                                    OS: ' . $product['os'] . ' <br>
                                </p>
                                <a href="#" class="btn btn-info btn-block">Add to cart</a>
                            </div>
                        </div>
    
                        <!-- Display product reviews here -->
                        <div class="card border-secondary mt-4">
                            <div class="card-body">
                                <h2>Product Reviews</h2>
                                <ul>';
            while ($review = $result_reviews->fetch_assoc()) {
                // Add star icons to the review based on the 'stars' column
                $starIcons = generateStarIcons($review['stars']);

                $output .= '<li>' . $starIcons . ' ' . $review['review_text'] . '</li>';
            }
            $output .= '
                                </ul>
                            </div>
                        </div>
                    </div>';

            echo $output;
        } else {
            echo "<h3>No Product Found</h3>";
        }
    } else {
        $sql = "SELECT * FROM products WHERE brand !=''";

        if (isset($_POST['brand'])) {
            $brand = implode("','", $_POST['brand']);
            $sql .= "AND brand IN('" . $brand . "')";
        }

        if (isset($_POST['ram'])) {
            $ram = implode("','", $_POST['ram']);
            $sql .= "AND ram IN('" . $ram . "')";
        }

        if (isset($_POST['hdd'])) {
            $hdd = implode("','", $_POST['hdd']);
            $sql .= "AND hdd IN('" . $hdd . "')";
        }

        if (isset($_POST['processor'])) {
            $processor = implode("','", $_POST['processor']);
            $sql .= "AND processor IN('" . $processor . "')";
        }

        if (isset($_POST['screen'])) {
            $screen = implode("','", $_POST['screen']);
            $sql .= "AND screen_size IN('" . $screen . "')";
        }

        if (isset($_POST['os'])) {
            $os = implode("','", $_POST['os']);
            $sql .= "AND os IN('" . $os . "')";
        }

        $result = $conn->query($sql);
        $output = '';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output .= '<div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card border-secondary">
                        <img src="' . $row['product_image'] . '" class="card-img-top" alt="">
                        <div class="card-body">
                            <h4 class="card-title">' . $row['product_name'] . '</h4>
                            <h4 class="card-title text-danger">Price: ' . $row['product_price'] . '/-</h4>
                            <p>
                                RAM: ' . $row['ram'] . ' <br>
                                HDD: ' . $row['hdd'] . ' <br>
                                Processor: ' . $row['processor'] . ' <br>
                                Screen Size: ' . $row['screen_size'] . ' <br>
                                OS: ' . $row['os'] . ' <br>
                            </p>
                            <a href="#" class="btn btn-info btn-block view-details" data-product-id="' . $row['product_id'] . '">View Details</a>
                        </div>
                    </div>
                </div>
            </div>';
            }
        } else {
            $output = "<h3>No Products Found</h3>";
        }
        echo $output;
    }
}
