<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo $user_chat;die;
//pre($reply_profile);die();
?>
<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
    <!--<![endif]-->

    <head>
        <!-- Page Title -->
        <title>Testing</title>
        <meta name="viewport" content=" user-scalable=no">
        <!-- Theme Styles -->
        <link rel="stylesheet" href="<?php echo base_url('assets/m_web/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/m_web/css/font-awesome.min.css'); ?>">

        <!-- Font Style Styles -->
        <link rel="stylesheet" href="<?php echo base_url('assets/m_web/css/app.css'); ?>">

        <link rel="stylesheet" href="<?php echo base_url('assets/m_web/css/style.css'); ?>">

        <!-- Owl Carousel for profile slider starts Assets -->
        <link href="<?php echo base_url('assets/m_web/owl-carousel/owl.carousel.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/m_web/owl-carousel/owl.theme.css'); ?>" rel="stylesheet">
        <!-- Owl Carousel for profile slider starts Assets -->
        <link rel="icon" href="data:;base64,iVBORw0KGgo=">
        <script src='https://cdn.firebase.com/js/client/2.4.0/firebase.js'></script>

    </head>

    <body>
        <!-- header starts -->
        <div class="mobile-header">
            <div class="container-fluid">
                <div class="row top-bar-section-chat">
                    <div class="col-sm-8 col-xs-8">
                        <div class="col-sm-1 col-xs-1">
                            <a class="menu-icon-chat" href="javascript:history.go(-1)"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                        </div>

                        <div class="col-sm-11 col-xs-11 no-padding chat-header-left">
                            <div class="col-sm-2 col-xs-2 no-padding chat-profile-image">
                                <?php
                                $user_chat = urldecode($user_chat);
                                if (strpos($user_chat, "_")) {
                                    $user_chat_1 = $user_chat;
                                    //------fetching data from firebase chat--- ".$userId."  ----------//


                                    $FIREBASE = "https://fir-jiffy.firebaseio.com/";
                                    $NODE_GET = "chatThread/" . $session_user . "/" . $user_chat_1 . ".json";

// Read data from firebase
                                    $curl = curl_init();
                                    curl_setopt($curl, CURLOPT_URL, $FIREBASE . $NODE_GET);
                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// Make request
// Close connection
                                    $response = curl_exec($curl);
                                    curl_close($curl);
// Show result
                                    $Chat_result = json_decode($response, true);
//pre($Chat_result);die;
                                    if ($Chat_result['opponentImage'] != '') {
                                        $OppoImage = $Chat_result['opponentImage'];
                                    } else {
                                        $OppoImage = base_url('profileImages/profile.png');
                                    }
                                } else {
                                    if ($reply_profile['login_type'] == 0) {
                                        $OppoImage = base_url('profileImages/' . $reply_profile['profileImage']);
                                        $Chat_result['opponentName'] = $reply_profile['first_name'];
                                    } else {
                                        $OppoImage = $reply_profile['profileImage'];
                                        $Chat_result['opponentName'] = $reply_profile['first_name'];
                                    }
                                }
                                ?>
                                <img src="<?php echo $OppoImage; ?>" />
                                <?php //}     ?>
                            </div>

                            <div class="col-sm-10 col-xs-10 chat-person-status">
                                <h5><?php echo $Chat_result['opponentName']; ?></h5>
                                <p id="IsOnline"></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-xs-4">
                        <div class="col-sm-6 col-xs-6 text-center chat-header-right">
                            <a class="last_seen" href="#">
                                <img src="<?php echo base_url('assets/m_web/images/last-seen.png'); ?>" />
                                <p>Last Seen</p>
                            </a>
                        </div>

                        <div class="col-sm-6 col-xs-6 text-center chat-header-right">
                            <a class="my_window" href="#">
                                <img src="<?php echo base_url('assets/m_web/images/my-window.png'); ?>" />
                                <p>My Window</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header ends  -->

        <!-- main section starts -->
        <div class="main-page-section">
            <div class="container-fluid">
                <div id="demo">
                    <!--<div class="col-sm-12 col-xs-12 online-shopping-section text-center">


                        <div class="row">
                            <div class="span12">

                                <div id="owl-example-1" class="owl-carousel">
                    <?php
                    if (count($categories) > 0) {
                        foreach ($categories as $catgries) {
                            ?>
                                                                                                                                                                                                                                                            <div class="item shop-icon-mobile">
                                                                                                                                                                                                                                                                <a class="shopping-links" href="<?php echo $catgries['url']; ?>" target="_blank"><img src="<?php echo base_url('assets/m_web/js/timthumb.php?src=' . base_url('assets/m_web/images/product-icon/' . $catgries['icon']) . '&w=80&h=80'); ?>"></a>
                                                                                                                                                                                                                                                            </div>
                            <?php
                        }
                    } else {
                        ?>
                                                                                                                                                <div class="item shop-icon-mobile">
                                                                                                                                                    <img src="<?php echo base_url('assets/m_web/images/search-icon.png'); ?>">
                                                                                                                                                </div>
                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>

                <!--                <div class="col-sm-12 col-xs-12 chat-area">
                                    <div class="col-sm-12 col-xs-12 chat-date-time text-center">
                                        <p>22 Sep, 20:10</p>
                                    </div>

                                    <div class="col-sm-12 col-xs-12 chat-reply">
                                        <div class="col-sm-2 col-xs-2 reply-profile-image">
                                            <img src="<?php echo base_url('assets/m_web/images/profile/2.jpg'); ?>" />
                                        </div>

                                        <div class="col-sm-10 col-xs-10 ">
                                            <ul class="reply-message">
                                                <li id="result">Hi James!, I'm your Jiffy Assistant</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12 chat-date-time text-center">
                                        <p>Today, 8:10</p>
                                    </div>

                                    <div class="col-sm-12 col-xs-12 your-reply">
                                        <div class="col-sm-2 col-xs-2 your-reply-profile-image pull-right">
                                            <img src="<?php echo base_url('assets/m_web/images/profile/1.jpg'); ?>" />
                                        </div>

                                        <div class="col-sm-10 col-xs-10 ">
                                            <ul class="your-reply-message">
                                                <li>ok</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>-->
                <div class="col-sm-12 col-xs-12 chatting" id="results" >



                </div>

                <input type="hidden" id="session_user" name="session_user" value="<?php echo $session_user; ?>">


            </div>

            <div class="col-sm-12 col-xs-12 message-new-box">
                <div class="col-sm-12 col-xs-12 message-section">
                    <!--<form>-->
                    <div class="col-sm-10 col-xs-10">
                        <textarea class="message-area" id="text" placeholder="Type your message" rows=11 cols=50 maxlength=250 required></textarea>

                    </div>

                    <div class="col-sm-2 col-xs-2">
                        <button id="post"><img src="<?php echo base_url('assets/m_web/images/send-button.png'); ?>"/></button>
                    </div>
                    <!--</form>-->
                </div>
            </div>

        </div>
        <!-- main section ends -->

        <style>
            .modal-dialognew{
                width: 90%;
            }

            .modal-headernew{
                border-bottom: none;
            }

            .modal-contentnew{
                float: left;
                width: 100%;
                margin-top: 20px;
            }


            .shopping-person img{
                width: 100%;
            }

            .modal-bodynew{
                padding: 0px;
            }

            .shopping-logo{
                position: relative;
                top: -60px;
            }

            .shopping-logo img{
                width: 65%;
            }

            .popup-text h3{
                font-family: 'robotolight';
                font-size: 60px
            }

            .bold{
                font-weight: bold;
            }

            .popup-social{
                margin: 30px 0px 40px;
            }

            .popup-social img{
                width: 100%;
            }

            .closenew{
                font-size: 47px;
                text-align: right;
                opacity: 1;
            }
        </style>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-dialognew">

                <!-- Modal content-->
                <div class="modal-content modal-contentnew">
                    <div class="modal-header modal-headernew">
                        <button  type="button" class="close closenew" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body modal-bodynew">
                        <div class="col-sm-12 col-xs-12 shopping-person">
                            <img src="<?php echo base_url('assets/m_web/images/popup-shop.png'); ?>"/>
                        </div>

                        <div class="col-sm-12 col-xs-12 text-center shopping-logo">
                            <img src="<?php echo base_url('assets/m_web/images/popup-shop-1.png'); ?>">
                        </div>

                        <div class="col-sm-12 col-xs-12 popup-text text-center">
                            <h3>For Better Experience</h3>
                            <h3 class="bold">Download the App</h3>
                        </div>

                        <div class="col-sm-6 col-xs-6 popup-social">
                            <a href="https://play.google.com/store?utm_source=apac_med&utm_medium=hasem&utm_content=Jul0116&utm_campaign=Evergreen&pcampaignid=MKT-DR-apac-in-all-med-hasem-py-Evergreen-Jul0116-1-BKWS|ONSEM_kwid_43700012164778770&gclid=Cj0KEQiAx7XBBRCdyNOw6PLHrYABEiQAJtyEQ_2yvCYkUHzyWcKJtQopTHivkaJar8E_Vu86ltd7qQgaAiHv8P8HAQ&gclsrc=aw.ds"><img src="<?php echo base_url('assets/m_web/images/google_play_store.png'); ?>"></a>
                        </div>

                        <div class="col-sm-6 col-xs-6 popup-social">
                            <a href="http://www.apple.com/in/itunes/"><img src="<?php echo base_url('assets/m_web/images/ios_app_store.png'); ?>"></a>
                        </div>
                    </div>
                    <div style="display: none" class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- side nav bar starts -->
        <?php $this->load->view('include/side_nav_bar'); ?>
        <!-- side nav bar ends -->

        <!-- script included -->
        <!-- script for profile icon slider -->
        <script src="<?php echo base_url('assets/m_web/assets/js/jquery-1.9.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/m_web/owl-carousel/owl.carousel.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/m_web/assets/js/bootstrap.min.js'); ?>"></script>

        <script src="https://www.gstatic.com/firebasejs/3.6.1/firebase.js"></script>
        <script>
            //<!-- we'll be adding code here -->
            // Initialize Firebase
            var config = {
                apiKey: "AIzaSyD1l_J1q1lqxfmXlmfyhRdjMWBg8FJHPjg",
                authDomain: "fir-jiffy.firebaseapp.com",
                databaseURL: "https://fir-jiffy.firebaseio.com",
                storageBucket: "firebase-jiffy.appspot.com",
                messagingSenderId:        "1088384610954"
            };
            firebase.initializeApp(config);
            var          myFirebase          =         new          Firebase('https://fir-jiffy.firebaseio.com/');
            var          sender           =          '<?php echo $session_user; ?>';
            var receiver = '<?php echo $user_chat; ?>';
            // alert(receiver);
            if (~receiver.indexOf("_")) {
                //for group chat of jiffy firebase chat
                var chat_path = receiver;
                var parent = myFirebase.child('chatList/').child(chat_path).child('messages');
                var textInput = document.querySelector('#text');
                var postButton = document.querySelector('#post');
                postButton.addEventListener("click", function () {
                    myFirebase.child('chatThread/').child(sender).child(receiver).on('value', function (snapshot) {
                        var groupdetail = snapshot.val();

                       

                        var text = $('#text').val();
                        var msgText = textInput.value;
                        if (text == '') {
                        } else {
                            var ts = Math.round((new Date()).getTime());
                            var res = chat_path.split("_");
//console.log(res);
                            var receiver_ids='';
                            for (i = 0; i < res.length; i++) {
                                if (!isNaN(res[i])) {
                                if(res[i] != sender) {
                                var receiver_ids = receiver_ids+','+res[i]; }
                                    firebase.database().ref('chatThread/').child(res[i]).child(chat_path).set({message: msgText, opponentId: receiver, opponentImage: "<?php echo $OppoImage; ?>", opponentName: '<?php echo $Chat_result['opponentName']; ?>', threadId: '<?php if (isset($Chat_result['threadId'])) {
            echo $Chat_result['threadId'];
        } else { ?>'+chat_Path+'<?php } ?>', time: "" + ts, type: "2", unreadMessageCount: "0"});
                                }
                            }

                            var ts = Math.round((new Date()).getTime());
                            parent.push({message: msgText, reciever: receiver, senderId: sender, senderImage: '<?php
        if ($your_profile['profileImage'] != '') {
            if ($your_profile['login_type'] != '0') {
                echo $your_profile['profileImage'];
            } else {
                echo base_url('profileImages/' . $your_profile['profileImage']);
            }
        } else {
            echo base_url('assets/m_web/images/profile.png');
        }
        ?>',senderName:"<?php echo $your_profile['first_name']; ?>", time: "" + ts, type: '1', url: ''});
                            textInput.value = "";

                        }

                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('index.php/saveChatMsgGroup'); ?>",
                            data: {
                                chatType: groupdetail.type,
                                chatKey: groupdetail.opponentId,
                                message: msgText,
                                image: groupdetail.opponentImage,
                                sender_id:'<?php echo $your_profile['id']; ?>' ,
                                name: '<?php echo $your_profile['first_name']; ?>',
                                receiver_id1 : receiver_ids 
                            },
                            success: function (data) {

                            }
                        });

                    });

                });
            }
            //for individual chat using jiffy firebase//
            else {
                //console.log(receiver);
                if ((parseInt(sender)) <= (parseInt(receiver))) {
                    var chat_path = sender + '_' + receiver;
                } else if ((parseInt(receiver)) < (parseInt(sender))) {
                    var chat_path = receiver + '_' + sender;
                }
                //change read Status//
                firebase.database().ref('userDetails/').child(sender).set({isOnline: receiver});
                //change read Status//

                //console.log(chat_path);
                var parent = myFirebase.child('chatList/').child(chat_path).child('messages');
                var textInput = document.querySelector('#text');
                var postButton = document.querySelector('#post');
                postButton.addEventListener("click", function () {
                    var text = $('#text').val();
                    var msgText = textInput.value;
                    if (text == '') {
                    } else {
                        var sender = '<?php echo $session_user; ?>';
                        var receiver = '<?php echo $user_chat; ?>';
                        if ((parseInt(sender)) <= (parseInt(receiver))) {
                            var chat_path = sender + '_' + receiver;
                        } else if ((parseInt(receiver)) < (parseInt(sender))) {
                            var chat_path = receiver + '_' + sender;
                        }
                        //IsOnline or Offline//
                        firebase.database().ref('userDetails/').child(receiver).on('value', function (snapshot) {
                            var status = snapshot.val();
                            /*if (status.isOnline == '-1') {
                             var rStatus = '0';
                             } else if (status.isOnline == '0') {
                             var rStatus = '0';
                             } else {
                             var rStatus = '1';
                             }*/
                            var ts = Math.round((new Date()).getTime());
                            //insert chat thread either in groups or individual//

                            //console.log(receiver);
                            //making chart thread to show on home page contacts//
                            firebase.database().ref('chatThread/').child(sender).child(chat_path).set({message: msgText, opponentId: receiver, opponentImage: "<?php
        if (array_key_exists('profileImage', $reply_profile) && $reply_profile['profileImage'] != '') {
            if ($reply_profile['login_type'] != '0') {
                echo $reply_profile['profileImage'];
            } else {
                echo base_url('profileImages/' . $reply_profile['profileImage']);
            }
        } else {
            echo base_url('assets/m_web/images/profile.png');
        }
        ?>", opponentName: '<?php echo (array_key_exists('first_name', $reply_profile) && $reply_profile['first_name'] != '') ? $reply_profile['first_name'] : ''; ?>', threadId: chat_path, time: "" + ts, type: "1", unreadMessageCount: "0"});

                            firebase.database().ref('chatThread/').child(receiver).child(chat_path).set({message: msgText, opponentId: sender, opponentImage: '<?php
        if ($your_profile['profileImage'] != '') {
            if ($your_profile['login_type'] != '0') {
                echo $your_profile['profileImage'];
            } else {
                echo base_url('profileImages/' . $your_profile['profileImage']);
            }
        } else {
            echo base_url('assets/m_web/images/profile.png');
        }
        ?>', opponentName: '<?php echo $your_profile['first_name'] ?>', threadId: chat_path, time: "" + ts, type: "1", unreadMessageCount: "0"});
                            //making chart thread to show on home page contacts// 

                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('index.php/saveChatMsg'); ?>",
                                data: {
                                    msgText: msgText,
                                    sender: sender,
                                    receiver: receiver,
                                    chat_path: chat_path,
                                    ts: ts,
                                    status: status.isOnline
                                },
                                success: function (data) {

                                }
                            });
                        });
                        //IsOnline or Offline// 
                        var ts = Math.round((new Date()).getTime());
                        parent.push({message: msgText, reciever: chat_path, senderId: sender, senderImage: "<?php
        if ($your_profile['profileImage'] != '') {
            if ($your_profile['login_type'] != '0') {
                echo $your_profile['profileImage'];
            } else {
                echo base_url('profileImages/' . $your_profile['profileImage']);
            }
        } else {
            echo base_url('assets/m_web/images/profile.png');
        }
        ?>", senderName: "<?php echo $your_profile['first_name']; ?>", time: "" + ts, type: '1', url: ''});
                        textInput.value = "";
                    }
                });
            }

            function checkOnlineOrNot() {
                var receiver = '<?php echo $user_chat; ?>';
                firebase.database().ref('userDetails/').child(receiver).on('value', function (snapshot) {
                    var status = snapshot.val();
                    if (status.isOnline == '-1') {
                        $('#IsOnline').text('Offline');
                    } else if (status.isOnline == '0') {
                        $('#IsOnline').text('Online');
                    } else {
                        $('#IsOnline').text('Online');
                        var updates = {};
                        updates['/readStatus/'] = '1';
                        firebase.database().ref('chatThread/').child(sender).child(chat_path).update(updates);
                        firebase.database().ref('chatThread/').child(receiver).child(chat_path).update(updates);
                    }
                });
            }
//------------------------------------fetching text messages here from firebase database--------------------------------------//
            var startListening = function () {
                //checkOnlineOrNot();
                //var senderImg = '0';
                //var receiverImg = '0';
                parent.on('child_added', function (snapshot) {
                    var msg = snapshot.val();
                    var session_user = '<?php echo $session_user; ?>';
                    //other user reply//
                    var msgElement = document.createElement('div');
                    msgElement.className = 'col-sm-12 col-xs-12 chat-area';
                    // Now create and append to msgElement
                    if (msg.senderId !== session_user) {
                        //alert(msg.senderImage);
                        var innerDiv = document.createElement('div');
                        innerDiv.className = 'col-sm-12 col-xs-12 chat-date-time text-center';
                        // The variable msgElement is still good... Just append to it.
                        msgElement.appendChild(innerDiv);
                        var innerDivchatreply = document.createElement('div');
                        innerDivchatreply.className = 'col-sm-12 col-xs-12 chat-reply';
                        // The variable msgElement is still good... Just append to it.
                        msgElement.appendChild(innerDivchatreply);
                        var innerDivchatreply1 = document.createElement('div');
                        innerDivchatreply1.className = 'col-sm-2 col-xs-2 reply-profile-image';
                        // The variable msgElement is still good... Just append to it.
                        innerDivchatreply.appendChild(innerDivchatreply1);
                        //if (senderImg == '0') {
                        var msgTextElementImg = document.createElement("img");
                        msgTextElementImg.setAttribute("src", msg.senderImage + "<?php
        /* if (array_key_exists('profileImage', $reply_profile) && $reply_profile['profileImage'] != '') {
          if ($reply_profile['login_type'] != '0') {
          echo $reply_profile['profileImage'];
          } else {
          echo base_url('profileImages/' . $reply_profile['profileImage']);
          }
          } else { ?>"+

          +"<?php } */
        ?>");
                        innerDivchatreply1.appendChild(msgTextElementImg);
                        var innerDivchatreply2 = document.createElement('div');
                        innerDivchatreply2.className = 'col-sm-10 col-xs-10';
                        // The variable msgElement is still good... Just append to it.
                        innerDivchatreply.appendChild(innerDivchatreply2);
                        var msgTextElementul = document.createElement("ul");
                        msgTextElementul.className = 'reply-message';
                        innerDivchatreply2.appendChild(msgTextElementul);
                        //finding time from millis //
                        var tm = new Date(parseInt(msg.time)).toLocaleTimeString();
                        //finding time from millis //
                        var msgTextElementDate = document.createElement("p");
                        msgTextElementDate.textContent = tm;
                        msgTextElementul.appendChild(msgTextElementDate);
                        var msgTextElementli = document.createElement("li");
                        msgTextElementli.textContent = msg.message;
                        msgTextElementul.appendChild(msgTextElementli);
//other user reply//
                    } else {


                        //your reply//

                        var innerDivchatreplyyour = document.createElement('div');
                        innerDivchatreplyyour.className = 'col-sm-12 col-xs-12 your-reply';
                        // The variable msgElement is still good... Just append to it.
                        msgElement.appendChild(innerDivchatreplyyour);
                        var innerDivchatreplyimage = document.createElement('div');
                        innerDivchatreplyimage.className = 'col-sm-2 col-xs-2 your-reply-profile-image pull-right';
                        // The variable msgElement is still good... Just append to it.
                        innerDivchatreplyyour.appendChild(innerDivchatreplyimage);
                        //if (receiverImg == '0') {
                        var msgTextElementyourImg = document.createElement("img");
                        msgTextElementyourImg.setAttribute("src", msg.senderImage + "<?php
        /* if ($your_profile['profileImage'] != '') {
          if ($your_profile['login_type'] != '0') {
          echo $your_profile['profileImage'];
          } else {
          echo base_url('profileImages/' . $your_profile['profileImage']);
          }
          } else {
          echo base_url('assets/m_web/images/profile.png');
          } */
        ?>");
                        innerDivchatreplyimage.appendChild(msgTextElementyourImg);
                        //senderImg = '0';
                        // receiverImg = receiverImg + 1;
                        // }

                        var innerDivchatreplychat = document.createElement('div');
                        innerDivchatreplychat.className = 'col-sm-10 col-xs-10 ';
                        innerDivchatreplyyour.appendChild(innerDivchatreplychat);
                        var msgTextElementyourul = document.createElement("ul");
                        msgTextElementyourul.className = 'your-reply-message';
                        innerDivchatreplychat.appendChild(msgTextElementyourul);
                        //finding time from millis //
                        var tm = new Date(parseInt(msg.time)).toLocaleTimeString();
                        //finding time from millis //
                        var msgTextElementDate = document.createElement("p");
                        msgTextElementDate.textContent = tm;
                        msgTextElementDate.style.float = 'right';
                        msgTextElementyourul.appendChild(msgTextElementDate);
                        var msgTextElementyourli = document.createElement("li");
                        msgTextElementyourli.textContent = msg.message;
                        msgTextElementyourul.appendChild(msgTextElementyourli);
                    }
                    //your reply//
                    document.getElementById("results").appendChild(msgElement);
                    $("#results").scrollTop(9999);
                });
            }
            // Begin listening for data
            startListening();
        </script>
        <!-- Frontpage Demo -->
        <script>
            $(document).ready(function ($) {
                $("#owl-example-1").owlCarousel();
            });
        </script>
        <!-- scrip for profile icon slider -->

        <!-- script for sidebar starts -->
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "500px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>

        <script>
            $(function () {
                var options = {
                    "backdrop": "static",
                    "show": true
                }
                $('.last_seen,.my_window').click(function () {
                    $("#myModal").modal(options);
                });
            });
        </script>
    </body>
</html>
