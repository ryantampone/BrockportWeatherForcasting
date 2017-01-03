<?php
function show_result($message, $fmemail, $fmphone, $hfemail, $hfphone, $forecasterfn, $forecasterln, $statusFlag, $emailSubject, $emailText, $phoneSubject, $phoneText)
{
  //----------------------------------------------------------
  // Start the html page
  echo "<HTML>";
  echo "<HEAD>";
  echo "</HEAD>";
  echo "<BODY>";


  //Mail function for email (only to be done if message is not an error)
  if ($statusFlag != 'error')
  {
      $toEmail = "$fmemail, $hfemail";
      $subjectEmail = $emailSubject;
      $txtEmail = $emailText;
      $headersEmail = "From: <brockportweatherforecasting@ryantampone.com>";
      mail($toEmail,$subjectEmail,$txtEmail,$headersEmail);

      //Mail functions for text message
      if ($fmphone != "")
    	{
        $toPhone1 = "$fmphone";
        $subjectPhone1 = $phoneSubject;
        $txtPhone1 = $phoneText;
        $headersPhone1 = "From: <bportforecasting@ryantampone.com>";
        mail($toPhone1,$subjectPhone1,$txtPhone1,$headersPhone1);
    	}

    	if ($hfphone != "")
      {
        $toPhone2 = "$hfphone";
        $subjectPhone2 = $phoneSubject;
        $txtPhone2 = $phoneText;
        $headersPhone2 = "From: <bportforecasting@ryantampone.com>";
        mail($toPhone2,$subjectPhone2,$txtPhone2,$headersPhone2);
    	}
  }


  $messageS = $message.$fmemail.$fmphone.$hfemail.$hfphone.$forecasterfn.$forecasterln;
  if ($messageS)
  {
    if ($messageS != "")
       {
          echo "<SCRIPT LANGUAGE='JavaScript'>
             window.alert('$messageS')
             window.location.href='index.php';
             </SCRIPT>";
       }
  }

    //finishes the html body
    echo "</BODY>";
    echo "</HTML>";
}
?>
