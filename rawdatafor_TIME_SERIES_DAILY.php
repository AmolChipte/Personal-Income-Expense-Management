test


<?php
$key="demo";
//Time Series Daily APIs
$url="https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=RELIANCE.BSE&outputsize=full&apikey=".$key;
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result,true);
echo '<pre>';
//print_r($result['NEWS_SENTIMENT'])
if(isset($result['Time Series (Daily)']))
{
    echo "<table id='customers' border='1'><tr><th>Date</th><th>Open</th><th>Hgh</th><th>Low</th></tr>";
    foreach($result['Time Series (Daily)'] as $key=>$val)
    {
        echo "<tr><th>$key</th><th>".$val['1. open']."</th><th>".$val['2. high']."</th><th>".$val['3. low']."</th></tr>"; 
    }
    echo "</table>";
}
else{
    echo "Something went wrong";
}
?>

<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
