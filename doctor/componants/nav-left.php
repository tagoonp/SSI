<ul class="nav navbar-nav navbar-right navbar-toolbar hidden-sm hidden-xs">

    <li class="dropdown">
        <a href="javascript:void(0)" data-toggle="dropdown"><i class="ion-ios-bell"></i> <span class="badge">3</span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li class="dropdown-header">Profile</li>
            <li>
                <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">3</span> News </a>
            </li>
            <li>
                <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">1</span> Messages </a>
            </li>
            <li class="divider"></li>
            <li class="dropdown-header">More</li>
            <li>
                <a tabindex="-1" href="javascript:void(0)">Edit Profile..</a>
            </li>
        </ul>
    </li>

    <li class="dropdown dropdown-profile" style="padding-top:10px;">
        <a href="javascript:void(0)" data-toggle="dropdown">
            <span class="m-r-sm"><?php print $valueUserinfo['fname']." ".$valueUserinfo['lname']; ?> <span class="caret"></span></span>
            <!-- <img class="img-avatar img-avatar-48" src="../assets/img/avatars/avatar3.jpg" alt="User profile pic" /> -->
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li class="dropdown-header">
                Pages
            </li>
            <li>
                <a href="profile.html">Profile</a>
            </li>
            <li>
                <a href="changepwd.html"><span class="badge badge-success pull-right">3</span> Change password</a>
            </li>
            <li>
                <a href="../signout.php">Logout</a>
            </li>
        </ul>
    </li>
</ul>
