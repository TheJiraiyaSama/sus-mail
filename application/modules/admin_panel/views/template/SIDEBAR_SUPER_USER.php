<?php
$page = (!isset($page)) ? "" : $page;
$tab = (!isset($tab)) ? "" : $tab;

$dashboard = "";
$users = "";
$association = $add_association = $list_association = "";
$service_management = $service = $add_service = $list_service = $add_sub_service = $list_sub_service = $sub_service = "";
$news = $add_news = $list_news = "";
$features = $add_features = $list_features = "";
$aboutus = $add_aboutus = $list_aboutus = "";
$profile = $update_profile = $change_password = "";
$request = "";
$send_mail_tab = $send_mail = $list_mail = "";
$team = $add_team = $list_team = "";
$event = $add_event = $list_event = "";
$gallery = "";
$support = "";
$faq = "";
$testimonial = $add_testimonial = $list_testimonial = "";
$configuration = "";
$contact = $add_contact = $list_contact = "";

if ($tab == "dashboard") {
    $dashboard = "active";
} else if ($tab == "users") {
    $users = "active";
}else if ($tab == "association") {
    $association = "active";
    if ($page == "add association") {
        $add_association = "active";
    } else if ($page == "list association") {
        $list_association = "active";
    }
} else if ($tab == "service") {
    $service_management = "active";
    if ($page == 'add service') {
        $service = "active";
        $add_service = "active";
    } else if ($page == "list service") {
        $list_service = "active";
        $service = "active";
    } else if ($page == "add sub service") {
        $add_sub_service = "active";
        $sub_service = "active";
    } else if ($page == "list sub service") {
        $list_sub_service = "active";
        $sub_service = "active";
    }
} else if ($tab == "news") {
    $news = "active";
    if ($page == "add news") {
        $add_news = "active";
    } else if ($page == "list news") {
        $list_news = "active";
    }
}else if ($tab == "testimonial") {
    $testimonial = "active";
    if ($page == "add testimonial") {
        $add_testimonial = "active";
    } else if ($page == "list testimonial") {
        $list_testimonial = "active";
    }
}else if ($tab == "configuration") {
    $configuration = "active";
} else if ($tab == "features") {
    $features = "active";
    if ($page == "add features") {
        $add_features = "active";
    } else if ($page == "list features") {
        $list_features = "active";
    }
} else if ($tab == 'aboutus') {
    $aboutus = "active";
    if ($page == 'add aboutus') {
        $add_aboutus = "active";
    } else if ($page == "list aboutus") {
        $list_aboutus = 'active';
    }
} 
else if ($tab == 'contactus') {
    $contactus = "active";
    if ($page == 'add contactus') {
        $add_contact = "active";
    } else if ($page == "list contactus") {
        $list_contact = 'active';
    }
} 

else if ($tab == 'video') {
    $video = "active";
    if ($page == 'add video') {
        $add_video = "active";
    } else if ($page == "list video") {
        $list_video = 'active';
    }
} 


else if ($tab == "request") {
    $request = "active";
} else if ($tab == 'send mail tab') {
    $send_mail_tab = "active";
    if ($page == 'send mail') {
        $send_mail = "active";
    } else if ($page == "list mail") {
        $list_mail = 'active';
    }
} else if ($tab == 'team') {
    $team = "active";
    if ($page == 'add team') {
        $add_team = "active";
    } else if ($page == "list team") {
        $list_team = 'active';
    }
}  else if ($tab == 'event') {
    $event = "active";
    if ($page == 'add event') {
        $add_event = "active";
    } else if ($page == "list event") {
        $list_event = 'active';
    }
}  else if ($tab == 'gallery') {
    $gallery = "active";
} else if ($tab == "support") {
    $support = "active";
} else if ($tab == "faq") {
    $faq = "active";
} else if ($tab == 'profile') {
    $profile = "active";
    if ($page == 'update profile') {
        $update_profile = "active";
    } else if ($page == "change password") {
        $change_password = 'active';
    }
}
?>
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="<?php echo $dashboard; ?>" href="<?php echo ADMIN_PANEL_URL . 'admin/index'; ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
          <li class="sub-menu dcjq-parent-li">
                <a href="javascript:;" class="dcjq-parent <?php echo $association; ?>">
                    <i class="fa fa-snowflake-o"></i>
                    <span>Keyword</span>
                    <span class="dcjq-icon"></span>
                </a>
                <ul class="sub" style="display: block;">
                    <li class="<?php echo $add_association; ?>"><a href="<?php echo ADMIN_PANEL_URL . 'Category/add_category'; ?>">Add Keyword</a></li>
                    <li class="<?php echo $list_association; ?>"><a href="<?php echo ADMIN_PANEL_URL . 'Category/list_category'; ?>">List Keyword</a></li>
                </ul>
            </li>
           <li class="sub-menu dcjq-parent-li">
                <a href="<?php echo ADMIN_PANEL_URL . 'mail/index'; ?>" class="dcjq-parent <?php echo $users; ?>">
                    <i class="fa fa-users"></i>
                    <span>Compose</span>
                </a>
               
            </li>
       <li class="sub-menu dcjq-parent-li">
                <a href="<?php echo ADMIN_PANEL_URL . 'mail/list_mail'; ?>" class="dcjq-parent <?php echo $support; ?>">
                    <i class="fa fa-headphones"></i>
                    <span>Inbox</span>
                </a>
          </li>
          <!--   <li class="sub-menu dcjq-parent-li">
               
                 <a href="<?php echo ADMIN_PANEL_URL . 'users/franchise_list'; ?>" class="dcjq-parent <?php echo $users; ?>">
                    <i class="fa fa-users"></i>
                    <span>Inbox</span>
                </a>
               
            </li> -->
            
          <li class="sub-menu dcjq-parent-li">
                <a href="<?php echo ADMIN_PANEL_URL . 'mail/list_mail'; ?>" class="dcjq-parent <?php echo $support; ?>">
                    <i class="fa fa-headphones"></i>
                    <span>OutBox</span>
                </a>
          </li>
      
       
            <li class="sub-menu dcjq-parent-li">
                <a href="javascript:;" class="dcjq-parent <?php echo $profile; ?>">
                    <i class="fa fa-user-circle"></i>
                    <span>Profile</span>
                    <span class="dcjq-icon"></span>
                </a>
                <ul class="sub" style="display: block;">
                    <li class="<?php echo $update_profile; ?>"><a href="<?php echo ADMIN_PANEL_URL . 'Profile/update_profile'; ?>">Update Profile</a></li>
                    <li class="<?php echo $change_password; ?>"><a href="<?php echo ADMIN_PANEL_URL . 'Profile/change_password'; ?>">Change Password</a></li>
                </ul>
            </li>
       
        </ul>
    </div>
</aside>