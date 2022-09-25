
<?php
    $site = $this->zettatech->get('site')->row();
?>
<table align="center" border="0" cellpadding="0" cellspacing="0" id="backgroundTable">
    <tbody>
        <tr>
            <td valign="top">
                <table align="center" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td height="90" style="color: #999999;" width="600">
                                <img src="<?=base_url()?>uploads/extra/logo/<?=$site->logo?>" alt="<?=$site->title?>" style="max-width: 111px; max-height: 70px;">
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#FFFFFF" height="200" style="background: whitesmoke; border: 1px  solid  #e0e0e0; font-family: Helvetica,Arial,sans-serif;" valign="top" width="600">
                                <table align="center" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td height="10" width="560">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td width="560" style="padding-left: 20px;">
                                                <h3 style="text-align: center;color: #B31329;"><?=$tour->t_english?></h3>

                                                <p style="font-size: 16px;font-weight: bold; text-align: center; font-family: Helvetica,Arial,sans-serif;">Ticket: <?=$order->tourID?></p>

                                                <div style="clear: both;"></div>

                                                <table style="margin: 0 auto;width: 400px;">
                                                    <tr>
                                                        <td style="text-align: left;">Client Name</td>
                                                        <td style="text-align: right;"><?=$order->full_name?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left;">Date</td>
                                                        <td style="text-align: right;"><?=date('d/m/Y',$order->dates)?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left;">Meeting Time</td>
                                                        <td style="text-align: right;"><?=$order->time?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left;">Meeting Location</td>
                                                        <td style="text-align: right;font-weight: bold;">Via degli Scipioni 9, CAP 00192, ROMA-ITALY</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: left;">Total Person</td>
                                                        <td style="text-align: right;"><?=$order->adult_qty+$order->student_qty+$order->child_qty?></td>
                                                    </tr>
                                                </table>
                                                <table style="margin: 0 auto;width: 300px;">
                                                    <tr>
                                                        <td style="text-align: center;width: 90px;border: 1px solid black;">Children: <?=$order->child_qty?></td>
                                                        <td style="text-align: center;width: 90px;border: 1px solid black;">Student: <?=$order->student_qty?></td>
                                                        <td style="text-align: center;width: 90px;border: 1px solid black;">Adult: <?=$order->adult_qty?></td>
                                                    </tr>
                                                </table>
                                                
                                                <p style="font-size: 12px; color: #B31329; text-align: right;padding-right: 20px; font-family: Helvetica,Arial,sans-serif;"><?=date('Y')?> @ Pioneer Tours</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="10" width="560">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </td>
                        </tr>
                        <tr>
                            <td height="10" width="600">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="right">
                                <span style="font-size: 10px; color: #999999; font-family: Helvetica,Arial,sans-serif;"><?=$site->copyrightYear?> &copy; <?=(!empty($site->copyrightUrl))?'<a href="'.$site->copyrightUrl.'">'.$site->copyrightText.'</a>':$site->copyrightText?> <?=(!empty($site->developedUrl))?'Developed & Maintains By <a href="'.$site->developedUrl.'">'.$site->developedText.'</a>':'Developed & Maintains By '.$site->developedText?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        
        </tr>
    </tbody>
</table>
