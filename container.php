<?php require_once 'core/init.php'; ?>

<?php if(is_logged_in()) { ?> 


<!-- start of chatframe -->
<div id="frame">
	<!-- start of sidebar -->
	<div id="sidepanel">
		<!-- start of profile -->
		<div id="profile">
			<?php $loggedUser = $chat->getUserDetails($_SESSION['userid']); ?>

			<div class="wrap">
				<?php $currentSession = ''; ?>

				<?php foreach ($loggedUser as $user): ?>
					<?php $currentSession = $user['current_session'];?>
					<img id="profile-img" src="userpics/<?= $user['avatar'] ?>" class="online" alt="" />
					<p><?= $user['username'] ?></p>
					<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
					<div id="status-options">
						<ul>
							<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
							<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
							<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
							<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
						</ul>
					</div>
					<div id="expanded">
						<a href="logout.php">Logout</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- end of profile -->

		<!-- start of start bar -->
		<div id="search">
			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
			<input type="text" placeholder="Search contacts..." />					
		</div>
		<!-- end of start bar -->

		<!-- start of contacts -->
		<div id="contacts">	
			<ul>
				<?php $chatUsers = $chat->chatUsers($_SESSION['userid']); ?>
				<?php foreach ($chatUsers as $user) : ?>

					<?php $status = 'offline'; ?>
					<?php if($user['online']): ?>
						<?php $status = 'online'; ?>
					<?php endif; ?>

					<?php $activeUser = '';?>
					<?php if($user['userid'] == $currentSession): ?>
						<?php $activeUser = "active";?>
					<?php endif; ?>

				<li id="<?= $user['userid'] ?>" class="contact <?= $activeUser ?>" data-touserid="<?= $user['userid'] ?>" data-tousername="<?= $user['username'] ?>">

					<div class="wrap">
						<span id="status_<?= $user['userid'] ?>" class="contact-status <?= $status ?>"></span>
						<img src="userpics/<?= $user['avatar'] ?>" alt="" />

						<div class="meta">
							<p class="name"><?= $user['username'] ?><span id="unread_<?= $user['userid']?>" class="unread"><?= $chat->getUnreadMessageCount($user['userid'], $_SESSION['userid']) ?> </span></p>
							<p class="preview"><span id="isTyping_<?= $user['userid'] ?>" class="isTyping"></span></p>
						</div>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<!-- end of contacts -->

		<!-- start  of bottom bar -->
		<div id="bottom-bar">	
			<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
			<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>					
		</div>
		<!-- end of bottom bar -->
	</div>
	<!-- end of sidebar -->		

	<!-- start of content -->		
	<div class="content" id="content"> 
		<div class="contact-profile" id="userSection">	
			<?php $userDetails = $chat->getUserDetails($currentSession); ?>
			<?php foreach ($userDetails as $user): ?>
				<img src="userpics/<?= $user['avatar'] ?>" alt="" />
				<p><?= $user['username'] ?></p>
				<div class="social-media">
				<i class="fa fa-facebook" aria-hidden="true"></i>
				<i class="fa fa-twitter" aria-hidden="true"></i>
				<i class="fa fa-instagram" aria-hidden="true"></i>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="messages" id="conversation">		
			<?= $chat->getUserChat($_SESSION['userid'], $currentSession); ?>
		</div>
		<div class="message-input" id="replySection">				
			<div class="message-input" id="replyContainer">
				<div class="wrap">
					<input type="text" class="chatMessage" id="chatMessage<?= $currentSession; ?>" placeholder="Write your message..." />
					<button class="submit chatButton" id="chatButton<?= $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>	
				</div>
			</div>					
		</div>
	</div>
	<!-- end of content -->		
</div>
<!-- end of chatframe -->


<?php } else { ?>

<!-- here you should add the login form instead -->

<div class="container">
	<h2>Example: Build Live Chat System with Ajax, PHP & MySQL</h1>		
		<div class="row ">

			<div class="col-sm-4"> 
				<!-- quick hack to make the login form to be in the center -->	
			</div>

			<div class="col-sm-4">
				<h4>Chat Login:</h4>		
				<form method="post" action="login.php">
					<div class="form-group">
						<?php $error = read_error_msg(); ?>
						<?php if ($error) { ?>
						<div class="alert alert-warning"><?php echo $error; ?></div>
						<?php } ?>
					</div>
					<div class="form-group">
						<label for="username">User:</label>
						<input type="username" class="form-control" name="username" required>
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" name="pwd" required>
					</div>  
					<button type="submit" name="login" class="btn btn-info">Login</button>
				</form>		
			</div>

		</div>

		<div class="row" style="margin-top: 10px">
			<div class="container">

				<table class="table">	
					<tr>
						<th>User</th>
						<th>Password</th>
					</tr>

					<tr>
						<td>adam</td>
						<td>123</td>
					</tr>
					<tr>
						<td>rose</td>
						<td>123</td>
					</tr>
					<tr>
						<td>smith</td>
						<td>123</td>
					</tr>
					<tr>
						<td>merry</td>
						<td>123</td>	
					</tr>
				</table>

			</div>
		</div>
	</div>	

	<?php } ?>

