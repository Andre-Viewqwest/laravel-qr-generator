<style type="text/css">
    .ptr {
        cursor: pointer;
    }

    .popup {
        border: solid 1px #333;
        font-family: Tahoma;
        font-size: 12px;
        display: none;
        position: absolute;
        float: left;
        /* margin-top:274px;
        margin-left:720px; */
        width: 200px;
        z-index: 60;
        /* FOR ROUND CORNER USING CSS3 */
        -webkit-border-radius: .5em;
        -moz-border-radius: .5em;
        border-radius: .5em;
        box-shadow: 0px 4px 8px #bba3d0;
    }

    .popuptitle {
        background: #44D62C;
        color: black;
        font-weight: bold;
        height: 23px;
        padding: 5px;

        /* FOR ROUND CORNER USING CSS3 */
        -webkit-border-radius-topright: .5em;
        -moz-border-radius-topright: .5em;
        border-top-left-radius: .5em;
        border-top-right-radius: .5em;

    }

    .popupbody {
        background: #ddd;
        padding: 5px;
        text-align: center;
        /* FOR ROUND CORNER USING CSS3 */
        -webkit-border-radius: .5em;
        -moz-border-radius: .5em;
        border-radius: .5em;
    }

    /*  #popup1 { top: 100px; left: 50px; } */

    #popup1 {
        top: 50%;
        left: 50%;
    }

    #popup2 {
        top: 100px;
        left: 400px;
    }
</style>

<script type="text/javascript">
    var fadeOpacity = new Array();
    var fadeTimer = new Array();
    var fadeInterval = 80; // milliseconds

    function fade(o, d) {

        // o - Object to fade in or out.
        // d - Display, true =  fade in, false = fade out

        var obj = document.getElementById(o);


        if ((fadeTimer[o]) || (d && obj.style.display != 'block') || (!d && obj.style.display == 'block')) {

            if (fadeTimer[o])
                clearInterval(fadeTimer[o]);
            else
            if (d) fadeOpacity[o] = 0;
            else fadeOpacity[o] = 9;

            obj.style.opacity = "." + fadeOpacity[o].toString();
            obj.style.filter =
                "alpha(opacity=" + fadeOpacity[o].toString() + "0)";

            if (d) {
                obj.style.display = 'block';
                fadeTimer[o] =
                    setInterval('fadeAnimation("' + o + '",1);', fadeInterval);
            } else
                fadeTimer[o] =
                setInterval('fadeAnimation("' + o + '",-1);', fadeInterval);
        }
    }

    function fadeAnimation(o, i) {

        // o - o - Object to fade in or out.
        // i - increment, 1 = Fade In

        var obj = document.getElementById(o);
        fadeOpacity[o] += i;
        obj.style.opacity = "." + fadeOpacity[o].toString();
        obj.style.filter = "alpha(opacity=" + fadeOpacity[o].toString() + "0)";

        if ((fadeOpacity[o] == '9') | (fadeOpacity[o] == '0')) {
            if (fadeOpacity[o] == '0')
                obj.style.display = 'none';
            else {
                obj.style.opacity = "1";
                obj.style.filter = "alpha(opacity=100)";
            }

            clearInterval(fadeTimer[o]);
            delete(fadeTimer[o]);
            delete(fadeTimer[o]);
            delete(fadeOpacity[o]);

        }
    }

    function put_value(val, cvv, day, year, carttype) {
        fade('popup1', false);
        var val;
        var cvv;
        var day;
        var year;
        var carttype;
        var o = document.credit;

        o.cardnumber.value = val;
        o.cvv.value = cvv;
        o.month.value = day;
        o.year.value = year;
        o.carttype.value = carttype;

    }
</script>


<div id="popup1" class="popup">
    <div class="popuptitle">Card Credit test patterns</div>
    <div class="popupbody">
        <table>
            <tr>
                <td align="middle" colspan="2"> <b> <img src="/MOLPay/images/icons/Tick.png" width="25" height="25"> Positive Test</b></td>
            </tr>
            <tr>
                <td>
                    <img src="/MOLPay/images/icons/visa.png" width="50" height="30">
                </td>
                <td>
                    <img src="/MOLPay/images/icons/sel.gif" onclick="put_value('4111111111111111','111',12,2026,'VISA');" height="20" width="80" class='ptr'>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="/MOLPay/images/icons/visa.png" width="50" height="30">
                </td>
                <td>
                    <img src="/MOLPay/images/icons/sel.gif" onclick="put_value('4012888888881881','111',12,2026,'VISA');" height="20" width="80" class='ptr'>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="/MOLPay/images/icons/mastercard.jpg" width="50" height="30">
                </td>
                <td>
                    <img src="/MOLPay/images/icons/sel.gif" onclick="put_value('5555555555554444','444',12,2026,'MASTERCARD');" height="20" width="80" class='ptr'>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="/MOLPay/images/icons/mastercard.jpg" width="50" height="30">
                </td>
                <td>
                    <img src="/MOLPay/images/icons/sel.gif" onclick="put_value('5105105105105100','444',12,2026,'MASTERCARD');" height="20" width="80" class='ptr'>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td align="middle" colspan="2">
                    <b><br><img src="/MOLPay/images/icons/Minus.png" width="25" height="25"> Negative Test<b>
                </td>
            </tr>
            <tr>
                <td>

                    <img src="/MOLPay/images/icons/visa.png" width="50" height="30">
                </td>
                <td>
                    <img src="/MOLPay/images/icons/sel.gif" onclick="put_value('4111111111111110',110,1,2026,'VISA');" height="20" width="80" class='ptr'>
                </td>
            </tr>
            <tr>
                <td><img src="/MOLPay/images/icons/mastercard.jpg" width="50" height="30"> </td>
                <td>
                    <img src="/MOLPay/images/icons/sel.gif" onclick="put_value('5555555555554440',440,1,2026,'MASTERCARD');" height="20" width="80" class='ptr'>
                </td>
            </tr>
            <tr>
                <td>Expired card &nbsp;</td>
                <td>
                    <img src="/MOLPay/images/icons/sel.gif" onclick="put_value('5555555555554444',444,12,2023,'MASTERCARD');" height="20" width="80" class='ptr'><br>
                </td>
            </tr>
        </table>
        <input type="button" value="Close" onClick="fade('popup1',false);" />


    </div>
</div>





<!DOCTYPE html>

<head>
    <meta charset="utf-8">

    <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Razer Merchant Services - E-commerce Service</title>
    <meta name="description" content="Secure Online Payment">
    <meta name="author" content="Razer Merchant Services - E-commerce Service">

    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
    <link href="/favicon.ico" rel="shortcut icon">

    <!-- CSS: implied media=all -->
    <!-- CSS concatenated and minified via ant build script-->
    <link rel="stylesheet" href="https://sandbox.merchant.razer.com/MOLPay/G/assets/css/style.min.css" media="all" type="text/css" />

    <style id="antiClickjack">
        body {
            display: none;
        }
    </style>
    <script type="text/javascript">
        if (self === top) {
            var antiClickjack = document.getElementById("antiClickjack");
            antiClickjack.parentNode.removeChild(antiClickjack);
        } else {
            top.location = self.location;
        }
    </script>

    <link rel="stylesheet" href="/NBepay/G/assets/css/jquery.fancybox.css">
    <link rel="stylesheet" href="/NBepay/G/assets/css/jquery.autocomplete.css">
    <link rel="stylesheet" href="/NBepay/G/assets/css/jquery.noty.css">
    <link rel="stylesheet" href="/NBepay/G/assets/css/noty_theme_default.css">
    <link rel="stylesheet" href="/NBepay/G/assets/css/jquery.tooltip.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <script src="/NBepay/G/assets/js/libs/jquery/jquery-1.7.1.js"></script>

    <script defer src="/NBepay/G/assets/js/libs/jquery/plugins/jquery.fancybox.js"></script>
    <script defer src="/NBepay/G/assets/js/script.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/1.5.1/fingerprint2.min.js"></script>
    <script>
        $(document).ready(function() {
            new Fingerprint2().get(function(result, components) {
                console.info("FID", result);
                if (document.getElementById('molpay_fingerprint') === null)
                    return;

                document.getElementById('molpay_fingerprint').value = result;
                var com = {};
                com._id = result;
                for (c in components)
                    com[components[c].key] = components[c].value;
                $.post("/MOLPay/MPFingerprint.php", com);
            });
        });
    </script>


</head>

<body>
    <header>
        <div class="container">

            </p>
        </div>
        <div id='chrome'></div>
        </div>
    </header> <!--! end of header -->
    <div id="main" role="main">
        <div id="toppanel">
            <div id="title">
                <!--<div class="secured"></div>-->
                <div class="text">
                    <div class="inner">
                        <!--<span class="first capital">secure </span><span class="orange capital">online payment</span>-->
                        <span class='first capital'>secure</span><span class='orange capital'> online payment</span>
                    </div>

                    <!-- placeholder for toolbar/multi channel -->

                    <SCRIPT LANGUAGE="JavaScript">
                        var opt_timer = null;

                        function change_action(s) {
                            if (opt_timer) {
                                clearTimeout(opt_timer);
                                opt_timer = null;
                            }
                            var o = document.getElementById(s);
                            o.click();
                        }

                        function set_action(s) {
                            document.forms.frmmulchannel.action = "/MOLPay/pay/SB_ViewQwest/" + s;
                            document.forms.frmmulchannel.submit();
                        }
                    </SCRIPT>
                    <link rel='stylesheet' href='../../G/assets/css/channel_sprites_overide.min.css' />
                    <style>
                        span.down {
                            height: 32px;
                            width: 32px;
                            float: right;
                            margin: auto;
                        }

                        span.down#arrow {
                            background: url('/NBepay/G/assets/img/down_square.png') no-repeat scroll center center transparent;
                        }

                        div.closepanel {
                            height: 22px;
                            width: 22px;
                            display: block;
                            position: absolute;
                            bottom: 0;
                            right: 0;
                            cursor: pointer;
                        }

                        div.closepanel#up {
                            background: url('/NBepay/G/assets/img/up_square.png') no-repeat scroll center center transparent;
                        }

                        div#channel {
                            line-height: 30px;
                        }

                        .mediumx {
                            font-size: 12px;
                            padding: 0.1em 0em 0.1em 1.0em;
                        }
                    </style>
                    <form name=frmmulchannel action='/MOLPay/pay/SB_ViewQwest/' method=post>
                        <input type=hidden name=amount value="1">
                        <input type=hidden name=orderid value="IDTEST2">
                        <input type=hidden name=currency value="MYR">
                        <input type=hidden name=bill_desc value="test">
                        <input type=hidden name=bill_name value="test">
                        <input type=hidden name=fshttpref value=":::122.52.153.148, 172.71.215.5">
                        <input type=hidden name=hash_fshttpref value="000ffda688b02d025c588f30bf098cfb">
                        <div class='toolbar' id='normalreso'>
                            <div id=credit class='current'></div>
                            <div class='divider'>&laquo;</div>
                            <div id='channel' class='button mediumx' title='Click here to change your payment method'>Payment Options<span class='down' id='arrow'></span></div>
                        </div>
                        <div id='smallreso'><br><select onchange='set_action(this.options[selectedIndex].value)'>
                                <option value='index.php' selected>Visa / MasterCard</option>
                                <option value='BIMB.php'>BANK ISLAM</option>
                                <option value='PBB.php'>Public Bank</option>
                                <option value='maybank2u.php'>Maybank2u</option>
                                <option value='hlb.php'>Hong Leong Online</option>
                                <option value='cimb.php'>CIMB Clicks</option>
                                <option value='rhb.php'>RHB Now</option>
                                <option value='cash.php'>7-Eleven Cash Retail</option>
                                <option value='amb.php'>AmOnline</option>
                                <option value='affin-epg.php'>Affin Bank</option>
                                <option value='RazerPay.php'>RazerPay</option>
                            </select></div>
                        <div id='panel'>
                            <div class='closepanel' id='up' title='Hide This'></div>
                            <ol id='payment_channel_list'>
                                <li class='list' title='Visa / MasterCard'>
                                    <div id='credit' onclick='set_action("index.php")'></div>
                                </li>
                                <li class='list' title='BANK ISLAM'>
                                    <div id='BIMB' onclick='set_action("BIMB.php")'></div>
                                </li>
                                <li class='list' title='Public Bank'>
                                    <div id='PBB' onclick='set_action("PBB.php")'></div>
                                </li>
                                <li class='list' title='Maybank2u'>
                                    <div id='m2u' onclick='set_action("maybank2u.php")'></div>
                                </li>
                                <li class='list' title='Hong Leong Online'>
                                    <div id='hlb' onclick='set_action("hlb.php")'></div>
                                </li>
                                <li class='list' title='CIMB Clicks'>
                                    <div id='cimb' onclick='set_action("cimb.php")'></div>
                                </li>
                                <li class='list' title='RHB Now'>
                                    <div id='rhb' onclick='set_action("rhb.php")'></div>
                                </li>
                                <li class='list' title='7-Eleven Cash Retail'>
                                    <div id='cash711' onclick='set_action("cash.php")'></div>
                                </li>
                                <li class='list' title='AmOnline'>
                                    <div id='amb' onclick='set_action("amb.php")'></div>
                                </li>
                                <li class='list' title='Affin Bank'>
                                    <div id='Affin-EPG' onclick='set_action("affin-epg.php")'></div>
                                </li>
                                <li class='list' title='RazerPay'>
                                    <div id='RazerPay' onclick='set_action("RazerPay.php")'></div>
                                </li>
                            </ol>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear"></div>

        <div id="container">
            <div id="message-box">
                <!-- placeholder for message-box -->

                <div class='warning'>
                    <span>Transaction will appear as <b><b style='color:red'>*</b>NetBuilder EC</b> on your
                        credit/debit card billing statement.</span>
                    <!--<br><span></span>-->
                    <br><span style='color:#FF0000'></span>
                </div>
            </div>

            <div class="clear"></div>

            <div id="form-wrapper">
                <!-- placeholder for form-wrapper -->

                <script src='/MOLPay/G/assets/js/block_cardbin.js' type='text/javascript' language='javascript'></script>
                <form id="credit" name="credit" action="/MOLPay/nbepay.php" method="post">
                    <input type=hidden id="merchantID" name="merchantID" value="SB_ViewQwest">
                    <input type=hidden id="vcode" name="vcode" value="">
                    <input type=hidden id="linkKey" name="linkKey" value="">
                    <!--<input type=hidden id="payment_gateway" name="payment_gateway" value="">-->
                    <input type=hidden id="payment_gateway" name="payment_gateway" value="paymex">
                    <input type=hidden id="httpref" name="httpref" value=":::122.52.153.148, 172.71.215.5">
                    <input type=hidden id="fshttpref" name="fshttpref" value=":::122.52.153.148, 172.71.215.5">
                    <input type=hidden id="hash_fshttpref" name="hash_fshttpref" value="000ffda688b02d025c588f30bf098cfb">
                    <input type=hidden id="carttype" name="carttype" value="">
                    <input type=hidden id="bank_detail" name="bank_detail" value="">
                    <input type=hidden id="returnurl" name="returnurl" value="">
                    <input type=hidden id="callbackurl" name="callbackurl" value="">
                    <input type=hidden id="notifyurl" name="notifyurl" value="">
                    <input type=hidden id="extra" name="extra" value="">
                    <input type=hidden id="currency" name="currency" value="myr">
                    <input type=hidden id="l_version" name="l_version" value="1">
                    <input type=hidden id="vc_currency" name="vc_currency" value="MYR">
                    <input type=hidden id="vc_channel" name="vc_channel" value="credit">
                    <input type=hidden id="langcode" name="langcode" value="en">
                    <input type=hidden id="def_amt" name="def_amt" value="1.00">
                    <input type=hidden id="def_cur" name="def_cur" value="MYR">
                    <input type=hidden id="is_escrow" name="is_escrow" value="0">
                    <input type=hidden id="tcctype" name="tcctype" value="">
                    <input type=hidden id="molpay_fingerprint" name="molpay_fingerprint">
                    <input type=hidden id="checkout_source" name="checkout_source" value="">
                    <fieldset>
                        <legend>VISA / MasterCard</legend>
                        <div class="field">
                            <label for="amount">Subtotal (MYR)</label>
                            <input id="amount" name="amount" readonly value="1.00" AUTOCOMPLETE=OFF tabindex=1 required />
                        </div>
                        <div class="field">
                            <label for="orderid">Order ID</label>

                            <input id="orderid" name="orderid" readonly value="IDTEST2" tabindex=2 required />
                        </div>
                        <div class="field">
                            <label for="cardnumber">Card Number</label>
                            <input id="cardnumber" class="bin" name="cardnumber" maxlength=16 AUTOCOMPLETE=OFF onBlur='check_bin();' onkeypress="$('#popup1').hide();" type="tel" tabindex=3 onfocus="fade('popup1', true);" required />
                            <!--<div class="info" title="Important Notice"></div>-->
                        </div>
                        <div class="field">
                            <label for="cvv">CVV</label>
                            <input id="cvv" name="cvv" maxlength=4 AUTOCOMPLETE=OFF type="tel" tabindex=4 required />
                            <div class="help" title="Help"></div>
                        </div>
                        <div class="field">
                            <label for="expiry_date">Expiry Date</label>
                            <select id="month" name="month" class="month" tabindex=5 required>
                                <option value="">Month</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <select id="year" name="year" class="year" tabindex=6 required>
                                <option value="">Year</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                                <option value="2033">2033</option>
                                <option value="2034">2034</option>
                                <option value="2035">2035</option>
                                <option value="2036">2036</option>
                            </select>
                            <div class="help" title="Help"></div>
                        </div>
                        <div class="field">
                            <label for="cardholder">Name of Cardholder</label>
                            <input id="cardholder" name="cardholder" type="text" value="test" AUTOCOMPLETE=ON tabindex=7 required class="cln" min="5" />

                        </div>
                        <div class="field">
                            <label for="email">Email</label>
                            <input id="email" name="email" placeholder="demo@email.com.my" type="email" value="" AUTOCOMPLETE=ON tabindex=8 required class="cln" min="5" />
                        </div>
                        <div class="field">
                            <label for="mobile">Mobile Number</label>
                            <input id="mobile" name="mobile" placeholder="e.g. +60182233999" type="tel" value="" AUTOCOMPLETE=ON tabindex=9 required class="cln" min="5" />
                        </div>
                        <div class="field" style="display: none;">
                            <label for="country">Country</label>
                            <select id="country" name="country" class="country" tabindex=10 required>
                                <option value="">Country</option>
                                <option value='AF'>AFGHANISTAN</option>
                                <option value='AX'>ALAND ISLANDS</option>
                                <option value='AL'>ALBANIA</option>
                                <option value='DZ'>ALGERIA</option>
                                <option value='AS'>AMERICAN SAMOA</option>
                                <option value='AD'>ANDORRA</option>
                                <option value='AO'>ANGOLA</option>
                                <option value='AI'>ANGUILLA</option>
                                <option value='AQ'>ANTARCTICA</option>
                                <option value='AG'>ANTIGUA AND BARBUDA</option>
                                <option value='AR'>ARGENTINA</option>
                                <option value='AM'>ARMENIA</option>
                                <option value='AW'>ARUBA</option>
                                <option value='AU'>AUSTRALIA</option>
                                <option value='AT'>AUSTRIA</option>
                                <option value='AZ'>AZERBAIJAN</option>
                                <option value='BS'>BAHAMAS</option>
                                <option value='BH'>BAHRAIN</option>
                                <option value='BD'>BANGLADESH</option>
                                <option value='BB'>BARBADOS</option>
                                <option value='BY'>BELARUS</option>
                                <option value='BE'>BELGIUM</option>
                                <option value='BZ'>BELIZE</option>
                                <option value='BJ'>BENIN</option>
                                <option value='BM'>BERMUDA</option>
                                <option value='BT'>BHUTAN</option>
                                <option value='BO'>BOLIVIA</option>
                                <option value='BA'>BOSNIA AND HERZEGOVINA</option>
                                <option value='BW'>BOTSWANA</option>
                                <option value='BV'>BOUVET ISLAND</option>
                                <option value='BR'>BRAZIL</option>
                                <option value='IO'>BRITISH INDIAN OCEAN TERRITORY</option>
                                <option value='BN'>BRUNEI DARUSSALAM</option>
                                <option value='BG'>BULGARIA</option>
                                <option value='BF'>BURKINA FASO</option>
                                <option value='BI'>BURUNDI</option>
                                <option value='KH'>CAMBODIA</option>
                                <option value='CM'>CAMEROON</option>
                                <option value='CA'>CANADA</option>
                                <option value='CV'>CAPE VERDE</option>
                                <option value='KY'>CAYMAN ISLANDS</option>
                                <option value='CF'>CENTRAL AFRICAN REPUBLIC</option>
                                <option value='TD'>CHAD</option>
                                <option value='CL'>CHILE</option>
                                <option value='CN'>CHINA</option>
                                <option value='CX'>CHRISTMAS ISLAND</option>
                                <option value='CC'>COCOS (KEELING) ISLANDS</option>
                                <option value='CO'>COLOMBIA</option>
                                <option value='KM'>COMOROS</option>
                                <option value='CG'>CONGO</option>
                                <option value='CD'>CONGO, THE DEMOCRATIC REPUBLIC OF THE</option>
                                <option value='CK'>COOK ISLANDS</option>
                                <option value='CR'>COSTA RICA</option>
                                <option value='CI'>COTE D'IVOIRE</option>
                                <option value='HR'>CROATIA</option>
                                <option value='CU'>CUBA</option>
                                <option value='CY'>CYPRUS</option>
                                <option value='CZ'>CZECH REPUBLIC</option>
                                <option value='DK'>DENMARK</option>
                                <option value='DJ'>DJIBOUTI</option>
                                <option value='DM'>DOMINICA</option>
                                <option value='DO'>DOMINICAN REPUBLIC</option>
                                <option value='EC'>ECUADOR</option>
                                <option value='EG'>EGYPT</option>
                                <option value='SV'>EL SALVADOR</option>
                                <option value='GQ'>EQUATORIAL GUINEA</option>
                                <option value='ER'>ERITREA</option>
                                <option value='EE'>ESTONIA</option>
                                <option value='ET'>ETHIOPIA</option>
                                <option value='FK'>FALKLAND ISLANDS (MALVINAS)</option>
                                <option value='FO'>FAROE ISLANDS</option>
                                <option value='FJ'>FIJI</option>
                                <option value='FI'>FINLAND</option>
                                <option value='FR'>FRANCE</option>
                                <option value='GF'>FRENCH GUIANA</option>
                                <option value='PF'>FRENCH POLYNESIA</option>
                                <option value='TF'>FRENCH SOUTHERN TERRITORIES</option>
                                <option value='GA'>GABON</option>
                                <option value='GM'>GAMBIA</option>
                                <option value='GE'>GEORGIA</option>
                                <option value='DE'>GERMANY</option>
                                <option value='GH'>GHANA</option>
                                <option value='GI'>GIBRALTAR</option>
                                <option value='GR'>GREECE</option>
                                <option value='GL'>GREENLAND</option>
                                <option value='GD'>GRENADA</option>
                                <option value='GP'>GUADELOUPE</option>
                                <option value='GU'>GUAM</option>
                                <option value='GT'>GUATEMALA</option>
                                <option value='GN'>GUINEA</option>
                                <option value='GW'>GUINEA-BISSAU</option>
                                <option value='GY'>GUYANA</option>
                                <option value='HT'>HAITI</option>
                                <option value='HM'>HEARD ISLAND AND MCDONALD ISLANDS</option>
                                <option value='VA'>Vatican City State (HOLY SEE)</option>
                                <option value='HN'>HONDURAS</option>
                                <option value='HK'>HONG KONG</option>
                                <option value='HU'>HUNGARY</option>
                                <option value='IS'>ICELAND</option>
                                <option value='IN'>INDIA</option>
                                <option value='ID'>INDONESIA</option>
                                <option value='IR'>IRAN, ISLAMIC REPUBLIC OF</option>
                                <option value='IQ'>IRAQ</option>
                                <option value='IE'>IRELAND</option>
                                <option value='IL'>ISRAEL</option>
                                <option value='IT'>ITALY</option>
                                <option value='JM'>JAMAICA</option>
                                <option value='JP'>JAPAN</option>
                                <option value='JO'>JORDAN</option>
                                <option value='KZ'>KAZAKHSTAN</option>
                                <option value='KE'>KENYA</option>
                                <option value='KI'>KIRIBATI</option>
                                <option value='KP'>KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF</option>
                                <option value='KR'>KOREA, REPUBLIC OF</option>
                                <option value='KW'>KUWAIT</option>
                                <option value='KG'>KYRGYZSTAN</option>
                                <option value='LA'>LAO PEOPLE'S DEMOCRATIC REPUBLIC</option>
                                <option value='LV'>LATVIA</option>
                                <option value='LB'>LEBANON</option>
                                <option value='LS'>LESOTHO</option>
                                <option value='LR'>LIBERIA</option>
                                <option value='LY'>LIBYAN ARAB JAMAHIRIYA</option>
                                <option value='LI'>LIECHTENSTEIN</option>
                                <option value='LT'>LITHUANIA</option>
                                <option value='LU'>LUXEMBOURG</option>
                                <option value='MO'>MACAO</option>
                                <option value='MK'>MACEDONIA,THE FORMER YUGOSLAV REP OF</option>
                                <option value='MG'>MADAGASCAR</option>
                                <option value='MW'>MALAWI</option>
                                <option value='MY' selected>MALAYSIA</option>
                                <option value='MV'>MALDIVES</option>
                                <option value='ML'>MALI</option>
                                <option value='MT'>MALTA</option>
                                <option value='MH'>MARSHALL ISLANDS</option>
                                <option value='MQ'>MARTINIQUE</option>
                                <option value='MR'>MAURITANIA</option>
                                <option value='MU'>MAURITIUS</option>
                                <option value='YT'>MAYOTTE</option>
                                <option value='MX'>MEXICO</option>
                                <option value='FM'>MICRONESIA, FEDERATED STATES OF</option>
                                <option value='MD'>MOLDOVA, REPUBLIC OF</option>
                                <option value='MC'>MONACO</option>
                                <option value='MN'>MONGOLIA</option>
                                <option value='MS'>MONTSERRAT</option>
                                <option value='MA'>MOROCCO</option>
                                <option value='MZ'>MOZAMBIQUE</option>
                                <option value='MM'>MYANMAR</option>
                                <option value='NA'>NAMIBIA</option>
                                <option value='NR'>NAURU</option>
                                <option value='NP'>NEPAL</option>
                                <option value='NL'>NETHERLANDS</option>
                                <option value='AN'>NETHERLANDS ANTILLES</option>
                                <option value='NC'>NEW CALEDONIA</option>
                                <option value='NZ'>NEW ZEALAND</option>
                                <option value='NI'>NICARAGUA</option>
                                <option value='NE'>NIGER</option>
                                <option value='NG'>NIGERIA</option>
                                <option value='NU'>NIUE</option>
                                <option value='NF'>NORFOLK ISLAND</option>
                                <option value='MP'>NORTHERN MARIANA ISLANDS</option>
                                <option value='NO'>NORWAY</option>
                                <option value='OM'>OMAN</option>
                                <option value='PK'>PAKISTAN</option>
                                <option value='PW'>PALAU</option>
                                <option value='PS'>PALESTINIAN TERRITORY, OCCUPIED</option>
                                <option value='PA'>PANAMA</option>
                                <option value='PG'>PAPUA NEW GUINEA</option>
                                <option value='PY'>PARAGUAY</option>
                                <option value='PE'>PERU</option>
                                <option value='PH'>PHILIPPINES</option>
                                <option value='PN'>PITCAIRN</option>
                                <option value='PL'>POLAND</option>
                                <option value='PT'>PORTUGAL</option>
                                <option value='PR'>PUERTO RICO</option>
                                <option value='QA'>QATAR</option>
                                <option value='RE'>REUNION</option>
                                <option value='RO'>ROMANIA</option>
                                <option value='RU'>RUSSIAN FEDERATION</option>
                                <option value='RW'>RWANDA</option>
                                <option value='SH'>SAINT HELENA</option>
                                <option value='KN'>SAINT KITTS AND NEVIS</option>
                                <option value='LC'>SAINT LUCIA</option>
                                <option value='PM'>SAINT PIERRE AND MIQUELON</option>
                                <option value='VC'>SAINT VINCENT AND THE GRENADINES</option>
                                <option value='WS'>SAMOA</option>
                                <option value='SM'>SAN MARINO</option>
                                <option value='ST'>SAO TOME AND PRINCIPE</option>
                                <option value='SA'>SAUDI ARABIA</option>
                                <option value='SN'>SENEGAL</option>
                                <option value='CS'>SERBIA AND MONTENEGRO</option>
                                <option value='SC'>SEYCHELLES</option>
                                <option value='SL'>SIERRA LEONE</option>
                                <option value='SG'>SINGAPORE</option>
                                <option value='SK'>SLOVAKIA</option>
                                <option value='SI'>SLOVENIA</option>
                                <option value='SB'>SOLOMON ISLANDS</option>
                                <option value='SO'>SOMALIA</option>
                                <option value='ZA'>SOUTH AFRICA</option>
                                <option value='GS'>SOUTH GEORGIA/THE SOUTH SANDWICH ISLANDS</option>
                                <option value='ES'>SPAIN</option>
                                <option value='LK'>SRI LANKA</option>
                                <option value='SD'>SUDAN</option>
                                <option value='SR'>SURINAME</option>
                                <option value='SJ'>SVALBARD AND JAN MAYEN</option>
                                <option value='SZ'>SWAZILAND</option>
                                <option value='SE'>SWEDEN</option>
                                <option value='CH'>SWITZERLAND</option>
                                <option value='SY'>SYRIAN ARAB REPUBLIC</option>
                                <option value='TW'>TAIWAN, REP OF CHINA</option>
                                <option value='TJ'>TAJIKISTAN</option>
                                <option value='TZ'>TANZANIA, UNITED REPUBLIC OF</option>
                                <option value='TH'>THAILAND</option>
                                <option value='TL'>TIMOR-LESTE</option>
                                <option value='TG'>TOGO</option>
                                <option value='TK'>TOKELAU</option>
                                <option value='TO'>TONGA</option>
                                <option value='TT'>TRINIDAD AND TOBAGO</option>
                                <option value='TN'>TUNISIA</option>
                                <option value='TR'>TURKEY</option>
                                <option value='TM'>TURKMENISTAN</option>
                                <option value='TC'>TURKS AND CAICOS ISLANDS</option>
                                <option value='TV'>TUVALU</option>
                                <option value='UG'>UGANDA</option>
                                <option value='UA'>UKRAINE</option>
                                <option value='AE'>UNITED ARAB EMIRATES</option>
                                <option value='UK'>UNITED KINGDOM</option>
                                <option value='US'>UNITED STATES</option>
                                <option value='UM'>UNITED STATES MINOR OUTLYING ISLANDS</option>
                                <option value='UY'>URUGUAY</option>
                                <option value='UZ'>UZBEKISTAN</option>
                                <option value='VU'>VANUATU</option>
                                <option value='VE'>VENEZUELA</option>
                                <option value='VN'>VIET NAM</option>
                                <option value='VG'>VIRGIN ISLANDS, BRITISH</option>
                                <option value='VI'>VIRGIN ISLANDS, U.S.</option>
                                <option value='WF'>WALLIS AND FUTUNA</option>
                                <option value='EH'>WESTERN SAHARA</option>
                                <option value='YE'>YEMEN</option>
                                <option value='ZM'>ZAMBIA, THE DEMOCRATIC REPUBLIC OF THE</option>
                                <option value='ZW'>ZIMBABWE</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="bank_country">Bank Country</label>
                            <span class="radio">
                                <input type="radio" id='country_opt' name="country_opt" value="1" tabindex=11 required> Malaysia
                            </span>
                            <span class="radio">
                                <input type="radio" id='country_opt' name="country_opt" value="0" tabindex=12 required> Non-Malaysia </span>
                            <span class="chalign">&nbsp;</span>
                            <select id="non_my" name="non_my" class="country dontshow" tabindex=13>
                                <option value='AF'>AFGHANISTAN
                                </option>
                                <option value='AX'>ALAND ISLANDS
                                </option>
                                <option value='AL'>ALBANIA
                                </option>
                                <option value='DZ'>ALGERIA
                                </option>
                                <option value='AS'>AMERICAN SAMOA
                                </option>
                                <option value='AD'>ANDORRA
                                </option>
                                <option value='AO'>ANGOLA
                                </option>
                                <option value='AI'>ANGUILLA
                                </option>
                                <option value='AQ'>ANTARCTICA
                                </option>
                                <option value='AG'>ANTIGUA AND BARBUDA
                                </option>
                                <option value='AR'>ARGENTINA
                                </option>
                                <option value='AM'>ARMENIA
                                </option>
                                <option value='AW'>ARUBA
                                </option>
                                <option value='AU'>AUSTRALIA
                                </option>
                                <option value='AT'>AUSTRIA
                                </option>
                                <option value='AZ'>AZERBAIJAN
                                </option>
                                <option value='BS'>BAHAMAS
                                </option>
                                <option value='BH'>BAHRAIN
                                </option>
                                <option value='BD'>BANGLADESH
                                </option>
                                <option value='BB'>BARBADOS
                                </option>
                                <option value='BY'>BELARUS
                                </option>
                                <option value='BE'>BELGIUM
                                </option>
                                <option value='BZ'>BELIZE
                                </option>
                                <option value='BJ'>BENIN
                                </option>
                                <option value='BM'>BERMUDA
                                </option>
                                <option value='BT'>BHUTAN
                                </option>
                                <option value='BO'>BOLIVIA
                                </option>
                                <option value='BA'>BOSNIA AND HERZEGOVINA
                                </option>
                                <option value='BW'>BOTSWANA
                                </option>
                                <option value='BV'>BOUVET ISLAND
                                </option>
                                <option value='BR'>BRAZIL
                                </option>
                                <option value='IO'>BRITISH INDIAN OCEAN TERRITORY
                                </option>
                                <option value='BN'>BRUNEI DARUSSALAM
                                </option>
                                <option value='BG'>BULGARIA
                                </option>
                                <option value='BF'>BURKINA FASO
                                </option>
                                <option value='BI'>BURUNDI
                                </option>
                                <option value='KH'>CAMBODIA
                                </option>
                                <option value='CM'>CAMEROON
                                </option>
                                <option value='CA'>CANADA
                                </option>
                                <option value='CV'>CAPE VERDE
                                </option>
                                <option value='KY'>CAYMAN ISLANDS
                                </option>
                                <option value='CF'>CENTRAL AFRICAN REPUBLIC
                                </option>
                                <option value='TD'>CHAD
                                </option>
                                <option value='CL'>CHILE
                                </option>
                                <option value='CN'>CHINA
                                </option>
                                <option value='CX'>CHRISTMAS ISLAND
                                </option>
                                <option value='CC'>COCOS (KEELING) ISLANDS
                                </option>
                                <option value='CO'>COLOMBIA
                                </option>
                                <option value='KM'>COMOROS
                                </option>
                                <option value='CG'>CONGO
                                </option>
                                <option value='CD'>CONGO, THE DEMOCRATIC REPUBLIC OF THE
                                </option>
                                <option value='CK'>COOK ISLANDS
                                </option>
                                <option value='CR'>COSTA RICA
                                </option>
                                <option value='CI'>COTE D'IVOIRE
                                </option>
                                <option value='HR'>CROATIA
                                </option>
                                <option value='CU'>CUBA
                                </option>
                                <option value='CY'>CYPRUS
                                </option>
                                <option value='CZ'>CZECH REPUBLIC
                                </option>
                                <option value='DK'>DENMARK
                                </option>
                                <option value='DJ'>DJIBOUTI
                                </option>
                                <option value='DM'>DOMINICA
                                </option>
                                <option value='DO'>DOMINICAN REPUBLIC
                                </option>
                                <option value='EC'>ECUADOR
                                </option>
                                <option value='EG'>EGYPT
                                </option>
                                <option value='SV'>EL SALVADOR
                                </option>
                                <option value='GQ'>EQUATORIAL GUINEA
                                </option>
                                <option value='ER'>ERITREA
                                </option>
                                <option value='EE'>ESTONIA
                                </option>
                                <option value='ET'>ETHIOPIA
                                </option>
                                <option value='FK'>FALKLAND ISLANDS (MALVINAS)
                                </option>
                                <option value='FO'>FAROE ISLANDS
                                </option>
                                <option value='FJ'>FIJI
                                </option>
                                <option value='FI'>FINLAND
                                </option>
                                <option value='FR'>FRANCE
                                </option>
                                <option value='GF'>FRENCH GUIANA
                                </option>
                                <option value='PF'>FRENCH POLYNESIA
                                </option>
                                <option value='TF'>FRENCH SOUTHERN TERRITORIES
                                </option>
                                <option value='GA'>GABON
                                </option>
                                <option value='GM'>GAMBIA
                                </option>
                                <option value='GE'>GEORGIA
                                </option>
                                <option value='DE'>GERMANY
                                </option>
                                <option value='GH'>GHANA
                                </option>
                                <option value='GI'>GIBRALTAR
                                </option>
                                <option value='GR'>GREECE
                                </option>
                                <option value='GL'>GREENLAND
                                </option>
                                <option value='GD'>GRENADA
                                </option>
                                <option value='GP'>GUADELOUPE
                                </option>
                                <option value='GU'>GUAM
                                </option>
                                <option value='GT'>GUATEMALA
                                </option>
                                <option value='GN'>GUINEA
                                </option>
                                <option value='GW'>GUINEA-BISSAU
                                </option>
                                <option value='GY'>GUYANA
                                </option>
                                <option value='HT'>HAITI
                                </option>
                                <option value='HM'>HEARD ISLAND AND MCDONALD ISLANDS
                                </option>
                                <option value='VA'>HOLY SEE (VATICAN CITY STATE)
                                </option>
                                <option value='HN'>HONDURAS
                                </option>
                                <option value='HK'>HONG KONG
                                </option>
                                <option value='HU'>HUNGARY
                                </option>
                                <option value='IS'>ICELAND
                                </option>
                                <option value='IN'>INDIA
                                </option>
                                <option value='ID'>INDONESIA
                                </option>
                                <option value='IR'>IRAN, ISLAMIC REPUBLIC OF
                                </option>
                                <option value='IQ'>IRAQ
                                </option>
                                <option value='IE'>IRELAND
                                </option>
                                <option value='IL'>ISRAEL
                                </option>
                                <option value='IT'>ITALY
                                </option>
                                <option value='JM'>JAMAICA
                                </option>
                                <option value='JP'>JAPAN
                                </option>
                                <option value='JO'>JORDAN
                                </option>
                                <option value='KZ'>KAZAKHSTAN
                                </option>
                                <option value='KE'>KENYA
                                </option>
                                <option value='KI'>KIRIBATI
                                </option>
                                <option value='KP'>KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF
                                </option>
                                <option value='KR'>KOREA, REPUBLIC OF
                                </option>
                                <option value='KW'>KUWAIT
                                </option>
                                <option value='KG'>KYRGYZSTAN
                                </option>
                                <option value='LA'>LAO PEOPLE'S DEMOCRATIC REPUBLIC
                                </option>
                                <option value='LV'>LATVIA
                                </option>
                                <option value='LB'>LEBANON
                                </option>
                                <option value='LS'>LESOTHO
                                </option>
                                <option value='LR'>LIBERIA
                                </option>
                                <option value='LY'>LIBYAN ARAB JAMAHIRIYA
                                </option>
                                <option value='LI'>LIECHTENSTEIN
                                </option>
                                <option value='LT'>LITHUANIA
                                </option>
                                <option value='LU'>LUXEMBOURG
                                </option>
                                <option value='MO'>MACAO
                                </option>
                                <option value='MK'>MACEDONIA,THE FORMER YUGOSLAV REP OF
                                </option>
                                <option value='MG'>MADAGASCAR
                                </option>
                                <option value='MW'>MALAWI
                                </option>
                                <option value='MV'>MALDIVES
                                </option>
                                <option value='ML'>MALI
                                </option>
                                <option value='MT'>MALTA
                                </option>
                                <option value='MH'>MARSHALL ISLANDS
                                </option>
                                <option value='MQ'>MARTINIQUE
                                </option>
                                <option value='MR'>MAURITANIA
                                </option>
                                <option value='MU'>MAURITIUS
                                </option>
                                <option value='YT'>MAYOTTE
                                </option>
                                <option value='MX'>MEXICO
                                </option>
                                <option value='FM'>MICRONESIA, FEDERATED STATES OF
                                </option>
                                <option value='MD'>MOLDOVA, REPUBLIC OF
                                </option>
                                <option value='MC'>MONACO
                                </option>
                                <option value='MN'>MONGOLIA
                                </option>
                                <option value='MS'>MONTSERRAT
                                </option>
                                <option value='MA'>MOROCCO
                                </option>
                                <option value='MZ'>MOZAMBIQUE
                                </option>
                                <option value='MM'>MYANMAR
                                </option>
                                <option value='NA'>NAMIBIA
                                </option>
                                <option value='NR'>NAURU
                                </option>
                                <option value='NP'>NEPAL
                                </option>
                                <option value='NL'>NETHERLANDS
                                </option>
                                <option value='AN'>NETHERLANDS ANTILLES
                                </option>
                                <option value='NC'>NEW CALEDONIA
                                </option>
                                <option value='NZ'>NEW ZEALAND
                                </option>
                                <option value='NI'>NICARAGUA
                                </option>
                                <option value='NE'>NIGER
                                </option>
                                <option value='NG'>NIGERIA
                                </option>
                                <option value='NU'>NIUE
                                </option>
                                <option value='NF'>NORFOLK ISLAND
                                </option>
                                <option value='MP'>NORTHERN MARIANA ISLANDS
                                </option>
                                <option value='NO'>NORWAY
                                </option>
                                <option value='OM'>OMAN
                                </option>
                                <option value='PK'>PAKISTAN
                                </option>
                                <option value='PW'>PALAU
                                </option>
                                <option value='PS'>PALESTINIAN TERRITORY, OCCUPIED
                                </option>
                                <option value='PA'>PANAMA
                                </option>
                                <option value='PG'>PAPUA NEW GUINEA
                                </option>
                                <option value='PY'>PARAGUAY
                                </option>
                                <option value='PE'>PERU
                                </option>
                                <option value='PH'>PHILIPPINES
                                </option>
                                <option value='PN'>PITCAIRN
                                </option>
                                <option value='PL'>POLAND
                                </option>
                                <option value='PT'>PORTUGAL
                                </option>
                                <option value='PR'>PUERTO RICO
                                </option>
                                <option value='QA'>QATAR
                                </option>
                                <option value='RE'>REUNION
                                </option>
                                <option value='RO'>ROMANIA
                                </option>
                                <option value='RU'>RUSSIAN FEDERATION
                                </option>
                                <option value='RW'>RWANDA
                                </option>
                                <option value='SH'>SAINT HELENA
                                </option>
                                <option value='KN'>SAINT KITTS AND NEVIS
                                </option>
                                <option value='LC'>SAINT LUCIA
                                </option>
                                <option value='PM'>SAINT PIERRE AND MIQUELON
                                </option>
                                <option value='VC'>SAINT VINCENT AND THE GRENADINES
                                </option>
                                <option value='WS'>SAMOA
                                </option>
                                <option value='SM'>SAN MARINO
                                </option>
                                <option value='ST'>SAO TOME AND PRINCIPE
                                </option>
                                <option value='SA'>SAUDI ARABIA
                                </option>
                                <option value='SN'>SENEGAL
                                </option>
                                <option value='CS'>SERBIA AND MONTENEGRO
                                </option>
                                <option value='SC'>SEYCHELLES
                                </option>
                                <option value='SL'>SIERRA LEONE
                                </option>
                                <option value='SG'>SINGAPORE
                                </option>
                                <option value='SK'>SLOVAKIA
                                </option>
                                <option value='SI'>SLOVENIA
                                </option>
                                <option value='SB'>SOLOMON ISLANDS
                                </option>
                                <option value='SO'>SOMALIA
                                </option>
                                <option value='ZA'>SOUTH AFRICA
                                </option>
                                <option value='GS'>SOUTH GEORGIA/THE SOUTH SANDWICH ISLANDS
                                </option>
                                <option value='ES'>SPAIN
                                </option>
                                <option value='LK'>SRI LANKA
                                </option>
                                <option value='SD'>SUDAN
                                </option>
                                <option value='SR'>SURINAME
                                </option>
                                <option value='SJ'>SVALBARD AND JAN MAYEN
                                </option>
                                <option value='SZ'>SWAZILAND
                                </option>
                                <option value='SE'>SWEDEN
                                </option>
                                <option value='CH'>SWITZERLAND
                                </option>
                                <option value='SY'>SYRIAN ARAB REPUBLIC
                                </option>
                                <option value='TW'>TAIWAN, REP OF CHINA
                                </option>
                                <option value='TJ'>TAJIKISTAN
                                </option>
                                <option value='TZ'>TANZANIA, UNITED REPUBLIC OF
                                </option>
                                <option value='TH'>THAILAND
                                </option>
                                <option value='TL'>TIMOR-LESTE
                                </option>
                                <option value='TG'>TOGO
                                </option>
                                <option value='TK'>TOKELAU
                                </option>
                                <option value='TO'>TONGA
                                </option>
                                <option value='TT'>TRINIDAD AND TOBAGO
                                </option>
                                <option value='TN'>TUNISIA
                                </option>
                                <option value='TR'>TURKEY
                                </option>
                                <option value='TM'>TURKMENISTAN
                                </option>
                                <option value='TC'>TURKS AND CAICOS ISLANDS
                                </option>
                                <option value='TV'>TUVALU
                                </option>
                                <option value='UG'>UGANDA
                                </option>
                                <option value='UA'>UKRAINE
                                </option>
                                <option value='AE'>UNITED ARAB EMIRATES
                                </option>
                                <option value='UK'>UNITED KINGDOM
                                </option>
                                <option value='US'>UNITED STATES
                                </option>
                                <option value='UM'>UNITED STATES MINOR OUTLYING ISLANDS
                                </option>
                                <option value='UY'>URUGUAY
                                </option>
                                <option value='UZ'>UZBEKISTAN
                                </option>
                                <option value='VU'>VANUATU
                                </option>
                                <option value='VA'>Vatican City State (HOLY SEE)
                                </option>
                                <option value='VE'>VENEZUELA
                                </option>
                                <option value='VN'>VIET NAM
                                </option>
                                <option value='VG'>VIRGIN ISLANDS, BRITISH
                                </option>
                                <option value='VI'>VIRGIN ISLANDS, U.S.
                                </option>
                                <option value='WF'>WALLIS AND FUTUNA
                                </option>
                                <option value='EH'>WESTERN SAHARA
                                </option>
                                <option value='YE'>YEMEN
                                </option>
                                <option value='ZM'>ZAMBIA, THE DEMOCRATIC REPUBLIC OF THE
                                </option>
                                <option value='ZW'>ZIMBABWE
                                </option>
                            </select>
                            <input type=hidden id="bank_country" name="bank_country" class="bin" required>
                        </div>
                        <div class="field">
                            <label for="bank_name">Bank Name</label>
                            <input id="bank_name" class="bin" name="bank_name" type="text" AUTOCOMPLETE=OFF tabindex=14 required class="cln" min="5" />
                        </div>
                        <div class="field">
                            <label for="desc">Description</label>
                            <textarea id="desc" name="desc" rows="4" class="cln" min="5" tabindex=15 required title="Description for your payment. E.g. product details, shipping information, remarks, etc." placeholder="Description for your payment. E.g. product details, shipping information, remarks, etc.">test</textarea>

                        </div>
                        <div class="field declaration">
                            <span style="clear:both;display:block;">
                                <input id="terms" name="terms" type="checkbox" tabindex=16 required />
                                I here by agree with the <a href='RMS_TNC_URL' tabindex=17 target='_blank'>Terms of Service</a> & <a href='RMS_PRIVACY_URL' tabindex=25 target='_blank'>Privacy Policy</a>.</span>
                            <span style='padding-right:10px; float: right;'>
                                <img src='/NBepay/G/assets/img/flag_red.png' border=0 align=absmiddle hspace=5 width="16" height="16">
                                <a id="inline" class="fancybox.ajax" href="/NBepay/G/abuse.html" tabindex=20>Report Abuse</a>
                            </span>
                            <div id="tosAdvice"></div>
                            <p class='tncextra'>

                                <font class='bullet'></font><span>Please refer to merchant refund policy. </span><br />


                                <font class='bullet'></font>
                                <span>Transaction will appear as <b><b style='color:red'>*</b>NetBuilder EC</b> on your credit/debit card billing statement.</span>
                            </p>
                        </div>
                        <div class="field submit">
                            <div class='button normal back' id='back' tabindex=19>Back</div>
                            <button id="pay" type="submit" class="normal" tabindex=18>Pay Online</button>
                        </div>
                    </fieldset>
                </form>
                <script>
                    function autoResize(id) {
                        var newheight;
                        var newwidth;

                        if (document.getElementById) {
                            newheight = document.getElementById(id).contentWindow.document.body.scrollHeight;
                            newwidth = document.getElementById(id).contentWindow.document.body.scrollWidth;
                        }

                        document.getElementById(id).height = (newheight) + "px";
                        document.getElementById(id).width = (newwidth) + "px";
                    }
                </script>

                <center>

                    <span class="bottom">
                        <div id="footer_container">
                            <div id="powered">
                                Powered By:<p>
                                    <img src='https://sandbox.merchant.razer.com/MOLPay/templates/images/razerms_logo.png' id='mp_logo' width="80" height="auto">
                            </div>
                            <div id="join_us">
                                <!--
             	<a href='http://www.facebook.com/MOLPay' target=_blank title='Like us at www.facebook.com/MOLPay'><img src='/NBepay/templates/images/fb.png'></a>
             	&nbsp;
             	<a href='http://www.twitter.com/molpay' target=_blank title='Follow us at twitter.com/molpay'><img src='/NBepay/templates/images/twitter.png'></a>
             	-->
                                <a href="https://www.facebook.com/RazerMerchantServices" target="_blank" alt="https://www.facebook.com/RazerMerchantServices" title="https://www.facebook.com/RazerMerchantServices">
                                    <img src="https://sandbox.merchant.razer.com/MOLPay/templates/images/icn-facebook.png" border=0 width="21" height="21"></a>
                                <a href="https://twitter.com/Razer_MS" target="_blank" alt="https://twitter.com/Razer_MS" title="https://twitter.com/Razer_MS">
                                    <img src="https://sandbox.merchant.razer.com/MOLPay/templates/images/icn-twitter.png" border=0 width="21" height="21"></a>
                                <a href="https://www.instagram.com/razermerchantservices/" target="_blank" alt="https://www.instagram.com/razermerchantservices/" title="https://www.instagram.com/razermerchantservices/">
                                    <img src="https://sandbox.merchant.razer.com/MOLPay/templates/images/icn-instagram.png" border=0 width="21" height="21"></a>
                            </div>
                        </div>
                        <!--<div style='clear:both;'></div>
        Copyright &copy; 2024 MOLPay Sdn Bhd (a MOL Global Group company). All rights reserved.<br>-->
                        <div style='clear:both;'></div>Razer Merchant Services<br>
                    </span>
                </center>
            </div>

            <section id="info">
                <!-- placeholder for information block -->
            </section>

            <section id="help">
            </section>
        </div>
        <!--! end of #container -->
    </div>
    <!--! end of #main -->

    <footer>
    </footer>
    <!--! end of footer -->



    <!--  <script src="/NBepay/G/assets/js/libs/jquery/plugins/jquery.fancybox.js"></script>	-->
    <script src="/NBepay/G/assets/js/libs/jquery/plugins/jquery.autocomplete.js"></script>
    <script src="/NBepay/G/assets/js/libs/jquery/plugins/jquery.blockUI.js"></script>
    <script src="/NBepay/G/assets/js/libs/jquery/plugins/jquery.noty.js"></script>
    <script src="/NBepay/G/assets/js/libs/jquery/plugins/jquery.tooltip.js"></script>
    <script src="/NBepay/G/assets/js/libs/date.js"></script>
    <script src="/NBepay/G/assets/js/getit.js"></script>



    <!-- scripts concatenated and minified via ant build script-->
    <script defer src="/NBepay/G/assets/js/plugins.js"></script>
    <script src="/NBepay/G/assets/js/libs/webforms/webforms2.js"></script>
    <!-- end scripts-->

    <!--<script src="/MOLPay/templates/jquery/plugins/jRating-master/jquery/jRating.jquery.js"></script>-->

    <!-- Change UA-XXXXX-X to be your site's ID -->
    <!-- <script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script> -->


    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
    <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->


    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"847521939a750428","version":"2023.10.0","token":"95f3f64e4a6141ae80c21afbef5c7541"}' crossorigin="anonymous"></script>
</body>

</html>
<!-- 3 -->
<!-- 