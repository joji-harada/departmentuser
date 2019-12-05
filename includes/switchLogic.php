<?php
 
if (isset($_GET['today'])) {
   $today = $_GET['today'];
} else {
   $today = date('l');
}
 
switch ($today) {
   case 'Sunday':
       $whiskey = 'Sunday is for Irish Whiskey.';
       $pic = 'irish.jpg';
       $alt = 'Irish Whiskey';
       $day = 'Sunday';
       $color = 'sun';
       $dailydesc = 'Irish whiskey has a smoother flavor than other types of whiskey. It’s made from a mash of malt, can only be distilled using water and caramel coloring, and must be distilled in wooden casks for at least three years. The result is a whiskey that’s easy to sip neat or on the rocks, though you can use Irish whiskey to make cocktails.';
   break;
   case 'Monday':
       $whiskey = 'Monday is for Scotch Whisky.';
       $pic = 'scotch.jpg';
       $alt = 'Scotch Whisky';
       $day = 'Monday';
       $color = 'mon';
       $dailydesc = 'Scotch whisky (aka just scotch) is made in Scotland with either malt or grain. The Scots take their whisky-making seriously and have laws in place that distillers must follow. The spirit must age in an oak barrel for at least three years. Plus, each bottle must have an age statement which reflects the youngest aged whisky used to make that blend. This is a whisky to sip neat—it makes an excellent after-dinner drink.';
   break;
   case 'Tuesday':
       $whiskey = 'Tuesday is for Japanese Whisky.';
       $pic = 'japanese.jpg';
       $alt = 'Japanese Whisky';
       $day = 'Tuesday';
       $color = 'tue';
       $dailydesc = 'A little later to the game than Irish and scotch, Japanese whisky has made its mark on the spirits world for its high standards. Japanese whisky was created to taste as close to the scotch style as possible and uses similar distilling methods. It is mostly imbibed in mixed drinks or with a splash of soda.';
   break;
   case 'Wednesday':
       $whiskey = 'Wednesday is for Canadian Whisky.';
       $pic = 'canadian.jpg';
       $alt = 'Canadian Whisky';
       $day = 'Wednesday';
       $color = 'wed';
       $dailydesc = 'Like scotch, Canadian whisky must be barrel-aged for at least three years. It’s lighter and smoother than other types of whiskey because it contains a high percentage of corn. You will find that most Canadian whiskies are made from corn and rye, but other may feature wheat or barley.';
   break;
   case 'Thursday':
       $whiskey = 'Thursday is for Bourbon Whiskey.';
       $pic = 'bourbon.jpg';
       $alt = 'Bourbon Whiskey';
       $day = 'Thursday';
       $color = 'thu';
       $dailydesc = 'An American-style whiskey, bourbon is made from corn. In fact, to be called bourbon whiskey, the spirit needs to be made from at least 51% corn, aged in a new oak barrel and produced in America. It has no minimum aging period and needs to be bottled at 80 proof or more.';
   break;
   case 'Friday':
       $whiskey = 'Friday is for Tennessee Whiskey.';
       $pic = 'tennessee.jpg';
       $alt = 'Tennessee Whiskey';
       $day = 'Friday';
       $color = 'fri';
       $dailydesc = 'While Tennessee whiskey is technically classified as bourbon, some distillers in the state aren’t too keen on that. Instead, they use Tennessee whiskey to define their style. All current Tennessee whiskey producers are required by state law to produce their whiskeys in Tennessee and to use a filtering step known as the Lincoln County Process prior to aging the whiskey.';
   break;
   case 'Saturday':
       $whiskey = 'Saturday is for Rye Whiskey.';
       $pic = 'rye.jpg';
       $alt = 'Rye Whiskey';
       $day = 'Saturday';
       $color = 'sat';
       $dailydesc = 'Rye whiskey is made in America with at least 51% rye, while other ingredients include corn and barley. It follows the distilling process of bourbon. Rye that has been aged for two or more years and has not been blended is dubbed “straight rye whiskey.” Rye tends to have a spicier flavor than sweeter, smoother bourbon.';
   break;
   default:
       $whiskey = '';
       $pic = '';
       $alt = '';
       $day = '';
       $color = '';
       $dailydesc = '';
   break;

}



define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

switch(THIS_PAGE){
    case 'index.php':
        $title = 'Home Page';
        $pageClass = 'home';
    break;
    case 'about.php':
        $title = 'About Page';
        $pageClass = 'about';
    break;
    case 'daily.php':
        $title = 'Daily Page';
        $pageClass = 'daily';
    break;
    case 'employees.php':
        $title = 'Employees Page';
        $pageClass = 'employees';
    break;
    case 'employees-view.php':
        $title = 'Employees Page';
        $pageClass = 'employees';
    break;
    case 'contact.php':
        $title = 'Contact Page';
        $pageClass = 'contact';
    break;
    case 'gallery.php':
        $title = 'Product Categories';
        $pageClass = 'gallery';
    break;

    default:
        $title = '';
        $pageClass = '';
}