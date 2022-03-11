<?php



include 'vendor/autoload.php';
$connect = new PDO("mysql:host=localhost;dbname=blog", "root", "");





if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();

  foreach($data as $row)
  {
   $insert_data = array(
    ':user_id'  => $row[0],
    ':title'  => $row[1],
    ':category'  => $row[2],
    ':content'  => $row[3],
    ':image'  => $row[4],
    ':views'  => $row[5],
    ':created_at'  => $row[6],
    ':active'  => $row[7],
    ':updated_at'  => $row[8],
    ':published'  => $row[9],
    ':published_date'  => $row[10],
    ':username'  => $row[11],
    ':feedback'  => $row[12],
    ':devices'  => $row[13],
    ':likes' => $row[14],
    ':dislikes' =>$row[15]
   );

   $query = "
   INSERT INTO posts
   (user_id, title, category,content,image,views,created_at,active ,updated_at,published,published_date,username,feedback,devices,likes,dislikes) 
   VALUES (:user_id, :title, :category,:content,:image,:views,:created_at,:active, :updated_at,:published,:published_date,:username,:feedback,:devices,:likes,:dislikes)
   ";

   $statement = $connect->prepare($query);
   $statement->execute($insert_data);
  }
  $message = '<div class="alert alert-success">Data Imported Successfully</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>