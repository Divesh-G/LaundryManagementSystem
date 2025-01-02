<div class="dashboard_sidebar" id="dashboard_sidebar">
    <h3 class="dashboard_logo" id="dashboard_logo">LMS</h3>
    <div class="dashboard_sidebar_user">
        <img src="user.jpg" alt="UserImage." id="userImage"/>
        <?php if (is_array($user) && isset($user['first_name']) && isset($user['last_name'])): ?>
            <span><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></span>
        <?php else: ?>
            <span>User</span>
        <?php endif; ?>
    </div>
    <div class="dashboard_sidebar_menus">
        <ul class="dashboard_menu_lists">
            <li>
                <a href="dashboard.php"><i class="fa fa-dashboard"></i><span class="menuText">Dashboard</span></a>
            </li>
            <li>
                <a href="users-add.php"><i class="fa fa-user-plus"></i><span class="menuText">Add User</span></a>
            </li>
            <li>
                <a href="laundry_list.php"><i class="fa fa-book"></i><span class="menuText">Laundry List</span></a>
            </li>
            <li>
                <a href="dry_cleaning_list.php"><i class="fa fa-book"></i><span class="menuText">Dry Cleaning List</span></a>
            </li>
            <li>
                <a href="view_order.php"><i class="fa fa-gears"></i><span class="menuText">View Orders</span></a>
            </li>
            <li>
                <a href="reports.php"><i class="fa fa-line-chart"></i><span class="menuText">Print Report</span></a>
            </li>
        </ul>
    </div>
</div>
