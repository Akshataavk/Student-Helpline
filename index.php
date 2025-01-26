<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dynamic Navigation</title>	
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<img src="https://i.imgur.com/yMem59R.png" alt="Logo" class="logo">
<!-- Logo hosted on the given imgur URL-->

    <!-- If needed, more tabs can be added -->
	<!-- Creating a sidebar with the different tabs under pages directory -->
    <div class="sidebar">
        <ul class="tabs">
            <?php
            // Fetch the list of tabs from pages directory 
            $tabs = array_diff(scandir('pages'), array('..', '.'));
		
			//tabs variable holds the list of variables found in the pages directory. 
			//Directories that are current or parent directories are excluded

            // Output the tab links
            foreach ($tabs as $tab) {
                echo "<li><a class='tab-link' data-tab='$tab'>$tab</a></li>";
				// data-tab stores the names of the different files under the directories 
            }
            ?>
        </ul>
    </div>

    <div class="content">
        <h2 class="header">TU Ilmenau Student Support Page!</h2>
        <div id="content">
            <?php
            // Check if a tab is specified in the URL
            if (isset($_GET['tab'])) {
                // Get the tab name from the URL
                $selectedTab = $_GET['tab'];

                // Check if the tab directory exists
                if (is_dir('pages/' . $selectedTab)) {
                    // Check if the index.html file exists in the tab directory
                    $indexFilePath = "pages/$selectedTab/index.html";
                    if (file_exists($indexFilePath)) {
                        // Output the contents of the index.html file
                        include($indexFilePath);
                    } else {
						//Condition to avoid multiple tabs and user clicking on a tab not specified
                        echo "Index file not found for $selectedTab";
								 }
                } else {
                    echo "Tab $selectedTab not found";
                }
            }
            ?>
        </div>
    </div>

    <!-- Sticky Footer -->
    <div class="footer">
		<!--Footer from TU Ilmenau website -->
        <button onclick="window.location.href = 'services.php';">Services</button>
        <button onclick="window.location.href = 'jobs.php';">Jobs and Careers</button>
        <button onclick="window.location.href = 'campus.php';">Campus and Directions</button>
        <span>&copy; TU Ilmenau 2024</span>
    </div>

    <script src="script.js"></script>
</body>
</html>
