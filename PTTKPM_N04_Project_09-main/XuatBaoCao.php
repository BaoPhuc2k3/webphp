<?php
require "pdfcrowd.php";

try
{
    // create the API client instance
    $client = new \Pdfcrowd\HtmlToPdfClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");

    // run the conversion and write the result to a file
    $client->convertFileToFile("/path/to/MyLayout.html", "MyLayout.pdf");
}
catch(\Pdfcrowd\Error $why)
{
    error_log("Pdfcrowd Error: {$why}\n");
    throw $why;
}

?>