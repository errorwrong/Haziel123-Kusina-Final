<?php

session_start();

						include_once 'logdb.php';
						$id = $_SESSION['id'];

						$oldpassword = md5($_POST['oldpassword']);
						$newpassword = md5($_POST['newpassword']);
						$confirmnewpassword = md5($_POST['confirmnewpassword']);

						

						$sql = "SELECT password FROM login WHERE id = $id ;"; 

						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						$row = mysqli_fetch_assoc($result);
								$oldpassworddb = $row["password"];
								echo $oldpassworddb."<br>";
						
								echo $oldpassword;
								if ($oldpassword == $oldpassworddb)
								{
									
									if ($newpassword == $confirmnewpassword) {
										
										$query = "UPDATE `login` SET `user_pwd` = '$newpassword' WHERE `login`.`id` = $id;"; 
										$result = mysqli_query($conn,$query) ;

										session_start();
										session_unset();
										session_destroy();
										header("Location: login.php");
										exit();
									}
									else{
										die ("new password dont match");
									}

								}
								else {
									die ("password dont match");
								}

							
						

							?>					