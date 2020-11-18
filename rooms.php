					<?php 
						include "assets/system/core.php";
						$rooms = mysqli_query($db, "SELECT * FROM rooms ORDER BY users_now DESC LIMIT 5");

						while ($room = mysqli_fetch_assoc($rooms)) {
							if ($room['state'] !== "invisible") {
							echo "
							<li>";
					?>
						<div id='users_now' style='background-position: 
						<?php

							if ($room['users_now'] === 0) {
								echo "0 0";
							} elseif ($room['users_now'] >= $room['users_max']-2) {
								echo "0 -54px";

							} elseif ($room['users_now'] >= $room['users_max']/2) {
								echo "0 -36px";

							} elseif ($room['users_now'] > 0) {
								echo "0 -18px";
							}
						?>
						'>
					<?php
						echo "
							<div id='usericon'></div>
									".$room['users_now']."
								</div>
								<a href='".$zan_settings['weblink']."client/?room=".$room['id']."' target='_blank'><span>".$room['caption']."</span></a>
						";
					?>
						<div class='iconright'>
								<div id='stateroom' style='background-position:
								<?php
									if ($room['state'] === "open") {
										echo "; display: none;";
									} elseif ($room['state'] === "locked") {
										echo "20px -45px";
									} elseif ($room['state'] === "password") {
										echo "20px -61px";
									}
								?>
								'>
								</div>
								<?php
								if ($room['group_id'] > 0) {
									echo "
										<div id='group_icon'></div>
									";
								}
								
								?>
					<?php
						echo "
							</div>
							</li>
							";
						}
						}

					?>