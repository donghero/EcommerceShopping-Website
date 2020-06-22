<?php
$conn = mysqli_connect("localhost:3305", "root", "1234", "dj");
mysqli_set_charset($conn, "utf8");
header("Content-type:text/html;charset=utf-8");
$select_contact = "select * from contact";
$run_contact = mysqli_query($conn, $select_contact);
while ($row_contact = mysqli_fetch_array($run_contact)) {
	$date = $row_contact['date'];
	$name = $row_contact['name'];
	$message = $row_contact['message'];

	echo "

                        <a class='dropdown-item d-flex align-items-center' href='#'>
                    <div class='dropdown-list-image mr-3'>
                        <div class='status-indicator bg-success'></div>
                    </div>
                    <div class='font-weight-bold'>
                        <div class='text-truncate'>$message</div>
                        <div class='small text-gray-500'>$name</div>
                    </div>
                </a>
                    ";
}
?>
