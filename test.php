<!--1. Please enter into the box below, the HTML you would write to create the following list of results. 

Columns: ID, Email Address, First Name, Last Name, Date Joined, Phone, Mobile, Country 

Please provide a heading row, and at least 5 rows of dummy data (does not need to be unique).-->

<!doctype html>
<html>
    <head>
        <title>Personal Details</title>
    </head>    
    <body>
       <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email Address</th>
                    <th>First NAme</th>
                    <th>Last Name</th>
                    <th>Date Joined</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Country</th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        <td>Red Colour</td>
                        <td>Red Colour</td>
                        <td>Red Colour</td>
                        <td>Red Colour</td>
                        <td>Red Colour</td>
                        <td>Red Colour</td>
                        <td>Red Colour</td>
                        <td>Red Colour</td>
                    </tr>
                    
                    <tr>
                        <td>Blue Colour</td>
                        <td>Blue Colour</td>
                        <td>Blue Colour</td>
                        <td>Blue Colour</td>
                        <td>Blue Colour</td>
                        <td>Blue Colour</td>
                        <td>Blue Colour</td>
                        <td>Blue Colour</td>
                    </tr>
                    
                    <tr>
                        <td>Black Colour</td>
                        <td>Black Colour</td>
                        <td>Black Colour</td>
                        <td>Black Colour</td>
                        <td>Black Colour</td>
                        <td>Black Colour</td>
                        <td>Black Colour</td>
                        <td>Black Colour</td>
                    </tr>
                    
                    <tr>
                        <td>Yellow Colour</td>
                        <td>Yellow Colour</td>
                        <td>Yellow Colour</td>
                        <td>Yellow Colour</td>
                        <td>Yellow Colour</td>
                        <td>Yellow Colour</td>
                        <td>Yellow Colour</td>
                        <td>Yellow Colour</td>
                    </tr>
                    
                    <tr>
                        <td>White Colour</td>
                        <td>White Colour</td>
                        <td>White Colour</td>
                        <td>White Colour</td>
                        <td>White Colour</td>
                        <td>White Colour</td>
                        <td>White Colour</td>
                        <td>White Colour</td>

                </tbody>


<!--2. Create the following website layout using divs.
Please make a full-page layout with no fixed height!
You may use < style > tags, or inline style="" styling. -->







3. Create a typical form that asks for the following details: 

User_ID (Hidden)
First Name (Input)
Gender (Radio)
Country (Select, only needs 2-3 options)
Description (Textarea)
Submit (Submit)










<!doctype html>
<html>
    <head>
        <title>Personal Details</title>
        <style media="screen" type="text/css">
            body, html {height:1000px; position:relative; margin:0; padding:0;}

            .menu ul li {
                display: inline;
                text-align: left;
                width: 400px;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .menu ul li a {
                float: left; text-decoration: none;
                color: white; 
                padding: 10.5px 11px;
                background-color:  #005555;
                border: 5px solid;
            }

            .menu ul li a:visited {
                color: white;
            }

            .menu ul li a:hover, .menu_simple ul li .current {
                color: white;
                background-color: #5FD367;
            }

            .fixed {position:fixed; top:0; left:0; z-index:2; width:100%;}
        </style>
        <script>
            $(window).scroll(function(){
                  if ($(this).scrollTop() > 135) {
                      $('#menu_fixed').addClass('fixed');
                  } else {
                      $('#menu_fixed').removeClass('fixed');
                  }
              });
        </script>
    </head>
    <body>
        <div class="menu_simple" id="menu_fixed">
            <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
            <li><a href="#">Link 5</a></li>
            </ul>
        </div>
    </body>
</html>

1. Please enter into the box below, the CSS Rules that would do the following: 

Make the background colour black.
Assign a transparent png background image.
Position the background in the middle of the screen vertically and horizontally.
Fix the background's position, so when scrolling it does not move. 

.backblack {
  background: #000000;
}

.transparent {
  background-color: transparent;
  background-image: url('imgtest.png');
  background-repeat: repeat-x;
}

.middle {
  width: 100px;
  height: 100px;
  background-color: red;
  position: absolute;
  top:0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
}

.fixedBackground {
  position : fixed; 
}


2. Please enter into the box below, the CSS Rules that would do the following: 

Add rounded corners to the top left and top right only with a radius of 10px.
Add a drop shadow that is 1 quarter opaque black and spreads softly for 5 pixels to the bottom rightable

.roundCorners {
  border-radius: 10px 10px 0 0;
}

div {
    height: 200px; 
    width: 500px; 
    position: relative; 
    background-color: #FFFFFF; 
    border-width: 1px; 
    border-style: solid; 
    border-color: #DDDDDD; 
    border-radius: 0px; 
    box-shadow: 10px 11px 17px 5px #777777; 
}


3. Please enter into the box below, the CSS Rules that would do the following: 

Create a centered menu using an unordered list (< ul >).
The menu must be positioned to the top of the page, even when scrolling.
The menu must be centered within the page.
Each element must be on the same line.
Each element within the menu must have the text aligned to the left.
Each option must have an outline/border of 1px,
but where each option meets to the left or right there must only be a 1px outline/border seen.
Such as: |           |menu1    |menu2    |menu3    |menu4    |         |
NOT: |           |menu1    ||menu2    ||menu3    ||menu4    |         |

<!doctype html>
<html>
    <head>
        <title>Personal Details</title>
        <style media="screen" type="text/css">
            body, html {height:1000px; position:relative; margin:0; padding:0;}

            .menu ul li {
                display: inline;
                text-align: left;
                width: 400px;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .menu ul li a {
                float: left; text-decoration: none;
                color: white; 
                padding: 10.5px 11px;
                background-color:  #005555;
                border: 5px solid;
            }

            .menu ul li a:visited {
                color: white;
            }

            .menu ul li a:hover, .menu_simple ul li .current {
                color: white;
                background-color: #5FD367;
            }

            .fixed {position:fixed; top:0; left:0; z-index:2; width:100%;}
        </style>
        <script>
            $(window).scroll(function(){
                  if ($(this).scrollTop() > 135) {
                      $('#menu_fixed').addClass('fixed');
                  } else {
                      $('#menu_fixed').removeClass('fixed');
                  }
              });
        </script>
    </head>
    <body>
        <div class="menu_simple" id="menu_fixed">
            <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
            <li><a href="#">Link 5</a></li>
            </ul>
        </div>
    </body>
</html>

======================== javascript =========================

1. Please enter into the box below, a Javascript function that will hide,
or show an element depending on it's current visible state.
function hideshow() {
    if (document.getElementById("text").style.display != 'none') {
        document.getElementById("text").style.display = 'none';
    } else {
        document.getElementById("text").style.display = 'block';
    }
}

2. Using the following variables, perform an mathematical addition in Javascript that will result in 8. 

var num1=4.5;
var num2='3.5';

<!doctype html>
<html>
    <head>
        <title>Personal Details</title>
        <script>
function addition() {
    var num1 = 4.5;
    var num2 = '3.5';

    var result = num1 + parseFloat(num2);
}
        </script>
    </head>
    <body>
        <button onclick="hideshow()">Click me</button>
        <div id="text">Show/Hide me</div>
    </body>
</html>

3. Create a Javascript function that will reposition an element to the center of the screen. 

This function must work, no matter what position the page is scrolled to.
<!doctype html>
<html>
    <head>
        <title>Personal Details</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>
/*$(window).scroll(function(){
HTMLElement.prototype.centre = function(){
  var w = document.documentElement.clientWidth, 
      h = document.documentElement.clientHeight;
  this.style.position = 'absolute';
  this.style.left = (w - this.offsetWidth)/2 + 'px';
  this.style.top = (h - this.offsetHeight)/2 + window.pageYOffset + 'px';
}

//var img = new Image(),
//    body = document.getElementsByTagName("body")[0];
//img.src = "http://www.lolcats.com/images/u/13/39/tastegood.jpg";
var body = document.getElementsByTagName("body")[0];
var div = document.getElementById('mybox');
div.centre();

body.appendChild(div);
});*/

function test(htmlelement)
{
    var w = document.documentElement.clientWidth, 
        h = document.documentElement.clientHeight;
    htmlelement.style.position = 'absolute';
    htmlelement.style.left = (w - htmlelement.offsetWidth)/2 + 'px';
    htmlelement.style.top = (h - htmlelement.offsetHeight)/2 + window.pageYOffset + 'px';
}
        </script>
        
        <style media="screen" type="text/css">
            body, html {height:10000px; position:relative; margin:0; padding:0;}
        </style>
        
    </head>
    <body>
        
        <button id="click" onclick="test(document.getElementById('mybox'))">Click</button>
        
        <div id="mybox" style="width: 200px; height: 300px; background: green;">&nbsp;</div> 

    </body>
</html>

4. Using DOM, Create a Javascript function that move an element from within it's parent element to another element. 

For example:

<ul id="list1">
   <li id="listItem1"></li>
</ul> 

<ul id="list2"></ul> 

Move listItem1 from list1 to list2.

var listElem = document.getElementById("listItem11");
var elem2 = document.getElementById("list2");
elem2.appendChild(listElem);

======================== mysql =========================
1. Please enter into the box below, a MySQL command to: 

Select the FirstName and LastName results from the Members table,
Only select results with a LastName beginning with 'A',
Retrieve the results ordered by FirstName, descending.

SELECT FirstName, LastName
FROM Members
WHERE LastName LIKE 'A%'
ORDER BY FirstName desc

2. Please enter into the box below, a single MySQL command to
select all the member details AND settings from the following tables: 

db.Members (memberID,email,fname,lname)
db.MemberSettings (settingID,memberID,setting1,setting2,setting3)

A result row should look as follows:
[0]=>[
     [memberID]=>1,
     [email]=>'sample@email.com',
     [fname]=>'sample',
     [lname]=>'name',
     [settingID]=>1,
     [setting1]=>1,
     [setting2]=>2,
     [setting3]=>3
]

SELECT
  m.memberID,
  m.email,
  m.fname,
  m.lname,
  ms.settingID,
  ms.setting1,
  ms.setting2,
  ms.setting3  
FROM
  db.Members m
JOIN
  db.MemberSettings ms
USING
  (memberID)

3. Please enter into the box below, a MySQL command to: 

Insert the following member into the Members table.

John Smith, j.smith@google.com

The Members table is as follows:
(memberid,email,fname,lname) with memberid being the primary key with auto_increment assigned.

INSERT INTO Members (email, fname, lname) VALUES('j.smith@google.com', 'John', 'Smith');

4. Using PHP code, create a connection to do the following: 

Create a connection to a dummy database.
Select the database: Store. Query the database, selecting all rows from the Members table inside the Store database.
Output the results into a HTML TABLE.
Clear the MySQL result from memory.

$username = 'databaseuser';
$password = 'fuzzypassword';
$database = 'Store';
$connection = new mysqli("localhost", $username, $password, $database);
if ($db->connect_error) {
    echo "Failed to connect to MySQL: (" . $db->connect_error . ") " . $db->connect_error;
} else {
    $sql = "
        SELECT *
        FROM Members
    ";
    $result = $connection->query($sql);
    if (!empty($result)) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<td>Email</td>";
        echo "<td>First Name</td>";
        echo "<td>Last Name</td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    unset($result);
}
======================== php =========================

1. Using PHP code, create an Image Handling class that can do the following: 

Accept an image file location to load an image for processing
Resize the image on call, based on a max width, or max height, keeping the aspect ratio
Crop the image to particular co-ordinates
Save the image
Output the file directly to the browsers

class ImageHandler
{
    protected $image;
    public $ext;
    public $maxWidth = 200;
    public $maxHeight = 350;
    
    function __construct($imgpath)
    {
        $info = getimagesize($imgpath);
        $mime = $info['mime'];
        switch ($mime) {
            case 'image/jpeg':
                $this->image = imagecreatefromjpeg($imgpath);
                $this->ext = 'jpg';
                break;

            case 'image/png':
                $this->image = imagecreatefrompng($imgpath);
                $this->ext = 'png';
                break;

            case 'image/gif':
                $this->image = imagecreatefromgif($imgpath);
                $this->ext = 'gif';
                break;

            default: 
                throw Exception('Unknown image type.');
        }
    }
    
    public function resizeImage($newWidth, $newHeight)
    {
        $targetFile = '/var/www/html/image2.jpg';
        list($width, $height) = array(imagesx($this->image), imagesy($this->image));
        $tmp = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmp, $this->image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        switch ($this->ext) {
            case 'jpg':
            case 'jpeg':
                imagejpeg($tmp, $targetFile, 95);
                break;
            case 'png':
                imagepng($tmp, $targetFile, 8.5);
                break;
            case 'gif':
                imagegif($tmp, $targetFile);
                break;
        }
    }
    
    public function cropImage($newWidth, $newHeight, $posX, $posY)
    {
        $this->image->crop();
    }
    
    public function saveImage($targetFile)
    {
        switch ($this->ext) {
            case 'jpg':
            case 'jpeg':
                imagejpeg($this->image, $targetFile . '/new.' . $this->ext, 95);
                break;
            case 'png':
                imagepng($this->image, $targetFile . '/new.' . $this->ext, 8.5);
                break;
            case 'gif':
                imagegif($this->image, $targetFile . '/new.' . $this->ext);
                break;
        }
    }
    
    public function printBrowser()
    {
        header('Content-Type: image/jpeg');

        imagejpeg($this->image);
    }
}

2. Create a Regular Expression that will: 

Search through a string for all contents AND contents tags, and retrieve the contents.

preg_replace('/<[^>]*>/', '', $text);


3. Create a function that will sort a multi-dimensional array by a sub value while keeping all indexes intact. 

Array:
$array=Array(
     [0]=>Array(
          'name'=>'John Smith',
          'email'=>'sample@email.com'
     ),
     [1]=>Array(
          'name'=>'Jane Doe',
          'email'=>'jane@email.com'
     )
);

Example function call to sort this array by email address: $array=MDSORT($array,'email');

function sortArray($array, $key)
{
    foreach($array as $k=>$v) {
        $sort[$key][$k] = $v[$key];
    }
    array_multisort($sort[$key], SORT_ASC, $sort[$key], SORT_ASC, $array);
    return $array;
}
$array = sortArray($array, 'email');
