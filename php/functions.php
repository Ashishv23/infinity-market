<?php 
// session_start();
function check_login($con)
{

	if(isset($_SESSION['id']))
	{

		$id = $_SESSION['id'];
		$query = "select * from users where id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

// Function to generate the navigation bar dynamically
function generateNavigationBar() {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        // If logged in, show the logout link in the navigation bar
        $navbar_link = 'logout.php'; // Replace 'logout.php' with the actual logout page URL
        $navbar_icon_class = 'fa fa-sign-out'; // Use appropriate icon for logout
        $navbar_text = 'Logout';
    } else {
        // If not logged in, show the login link in the navigation bar
        $navbar_link = 'login.php'; // Replace 'login.php' with the actual login page URL
        $navbar_icon_class = 'fa fa-sign-in'; // Use appropriate icon for login
        $navbar_text = 'Login';
    }

    // Generate the HTML for the navigation bar
    $html = '<!-- Nav bar -->
             <div id="nav-bar">
                <a href="" class="nav-bar-link active">Home</a>
                <a href="order_list.html" class="nav-bar-link">Orders</a>
                <a href="create_shop_manager.html" class="nav-bar-link">Create shop manager</a>
                <a href="' . $navbar_link . '" class="nav-bar-profile">
                    <span class="' . $navbar_icon_class . '"></span>
                    <!-- <div id="profile-image"></div> -->
                    ' . $navbar_text . '
                </a>
                <a href="#" class="grid-icon grid-icon--fill nav-bar-grid">
                    <span class="layer layer--primary">
                        <span></span>
                    </span>
                    <span class="layer layer--secondary">
                        <span></span>
                    </span>
                    <span class="layer layer--tertiary">
                        <span></span>
                    </span>
                </a>
            </div>';

    // Output the HTML
    echo $html;
}
?>