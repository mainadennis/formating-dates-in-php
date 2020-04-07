<!-- /*! 
 * php date template 1.0
 * http://devhacks.com
 *
 * Released under the MIT license.
 Author : Dennis Maina
 Release data : Tuesday 1 ,April 2020
 */
-->
<?php
/* **********************************************************************************************
   *             function for getting difference in dates and returning the difference          *
   * ie : 10 seconds ago
   *      10 minutes ago
   *      1 hhour ago
   *      2 days ago
   *      4 months ago
   *      3 years ago
  ************************************************************************************************
 */
// having declared variable $st as aglobal variable
$st = ($row['database_date']); 
// where $row['receive_date'] is the date your retrieving from the database

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  + calling the function eg <?php echo ago($now = new DateTime('now')); ?> +
  + where variable now holds the current date                              +
  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
  
function plur($count,$text){ //a function that adds a suffix in singular or
    // plural form according to the difference in time.
  return $count.(($count==1)?(" $text"):(" ${text}s") );
}
function ago ($now){
  global $st;
  $ft = new DateTime($st); //convert the date string to the datetime format
  $int = $ft -> diff($now); //get the difference between the dates passed
  $sufix = ($int->invert?' ago' : ' ago');
  if ($int->y>=1)return plur($int->y,'year').$sufix;   //calculate the difference in years
  if ($int->m>=1)return plur($int->m,'Month').$sufix;  //calculate the difference in months
  if ($int->d>=1)return plur($int->d,'Day').$sufix;    //calculate the difference in days
  if ($int->h>=1)return plur($int->h,'Hour').$sufix;   //calculate the difference in hours
  if ($int->i>=1)return plur($int->i,'Minute').$sufix; //calculate the difference in minutes
  if ($int->s>=1)return plur($int->s,'second').$sufix; //calculate the difference in seconds
}




/*++++++++++++++++++++++++++++++++++++++++++++++++++++++
 + formating date string outut into different formats  +
 +++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
//  using $row['date']; as the result from the database 

//  eg Mar 31,2020 13:00:am
echo date("M d, Y  h:i:a",strtotime($row['date']));
//  eg Tue, 31 Mar 2020
echo date("D, d M Y",strtotime($row['receive_date']));

// different characters and their meaning as used with the date() function
// the date function takes two parameters ie date($format, $timestamp)
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  + character                               meaning                                             example               +
  +++++++++++++++           +++++++++++++++++++++++++++++++++++++++++++++++++++           +++++++++++++++++++++++++++++
  +                         DATES                                                                                     +
  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  d                         day of the month with leading zeros                            01 or 13
  j                         day of the month without leading zeros                         1 or 13
  D                         day of the week as athree letter abbreviation                  Tue
  l                         full day of the week                                           Tuesday
  m                         month as anumber with leading zeros                            04 or 12
  n                         month as anumber without leading zeros                         4 or 12
  M                         month as a three letter abbreviation                           Apr
  F                         full month                                                     April
  y                         two-digit year                                                 20
  Y                         full year                                                      2020
  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  +                            TIME                                                                                  + 
  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  +   g                     hours in 12-hour format without leading zeros                  1 or 12                   +
  +   h                     hours in 12-hour format with leading zeros                     01 or 12                  + 
  +   G                     hours in 24-hour format without leading zeros                  1 or 13                   +
  +   H                     hours in 24-hour format with leading zeros                     01 or 13                  +
  +   a                     am/pm in lowercase                                             am                        + 
  +   A                     am/pm in lowercase                                             AM                        +
  +   i                     minutes with leading zeros                                     09 or 15                  +
  +   s                     seconds with leading zeros                                     09 or 20                  +
  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 */
?>

