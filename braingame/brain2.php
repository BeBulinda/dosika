<!-- Table -->  
<?php 
error_reporting(0);
require_once ('../php/conn_x1.php');
$cont='';
$yest='20'.date('y-m-d', time() - 60 * 60 * 24);
$today='20'.date('y-m-d');
if($_POST['submit']){
	
	$_SESSION['e']=$_POST['date'];
}
?>
  
    <div class="table">
        <form  method="POST" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">	
		<!--<select name="parentgroup" type="text" style="margin-left:0%;color:red;max-width:35%;">
		<option value=''>Select category here</option>
		<option value='A'>Top Weekly Participants</option>				
		<option value='B'?>>Top Daily Participants</option>
			
				</select>-->
                <div class="entry_date">
				<input type="submit" name="today" width="25" value="Today's Entries"/>
				<!--<input type="date" name="date"  title="Participants By date" style="color:red" placeholder="Participants per date" onchange="this.form.submit();">-->
&#124;
<input id="date" name="date" style="color: #000;" placeholder="CHOOSE DATE" type="text" size="15" <?php if(isset($_SESSION['e'])){?> value = "<?php echo $_SESSION['e'];?>" <?php } ?>/>
                                        <a href="javascript:NewCal('date','mmddyyyy')"><!-- ddmmyyyy-->
                                            <img style="margin-top: 8px; margin-left: -45px;" src="images/Calendar.png" width="32" height="32" border="0" alt="Pick a date">
                                        </a>
									&nbsp;&nbsp;&nbsp;
<input type="submit" value="GO!">									
            
       <br/>     
			
				<input style="margin-left:0%; color: #000;" placeholder="FROM" id="from" name="from" type="text" size="15" <?php if(isset($_SESSION[d])){?> value = "<?php echo $_SESSION[d];?>" <?php } ?>>
                                        <a href="javascript:NewCal('from','mmddyyyy')"><!-- ddmmyyyy-->
                                            <img style="margin-top: 8px; margin-left: -45px;" src="images/Calendar.png" width="32" height="32" border="0" alt="Pick a date">
                                        </a>
										
                                    <input id="to" name="to" style="color: #000;" placeholder="TO" type="text" size="15" <?php if(isset($_SESSION[e])){?> value = "<?php echo $_SESSION[e];?>" <?php } ?> style="color:red;">
                                        <a href="javascript:NewCal('to','mmddyyyy')"><!-- ddmmyyyy-->
                                            <img style="margin-top: 8px; margin-left: -45px;" src="images/Calendar.png" width="32" height="32" border="0" alt="Pick a date">
                                        </a>&nbsp;&nbsp;&nbsp;
										<input type="submit" value="GO!" name="weekly" >
            </div>
				
				</form>
            </div>
				</div><br>
      <div class="div1">
    
				<?php
				if($_POST['today'])
			   {			
				?>
				<h4>Top Participants <?php echo date('d-m-y'); ?></h4>
				<?php 
                    } 
                if($_POST['date'])
                {
                ?>
                <h4>Top Participants <?php  
                $date =$_POST['date'];
                echo date('d-m-20y',strtotime(str_replace('-', '/', $date)));?></h4>
                <?php 
                }
                if($_POST['weekly'])
                {
                ?>
                <h4>Participants Between
                <?php
                $f=$_POST['from'];
                $from=date('d-m-20y',strtotime(str_replace('-', '/', $f)));
                $t=$_POST['to'];
                $to=date('d-m-20y',strtotime(str_replace('-', '/', $t)));
                $today=date('d-m-20y');
                if($to!=$today)
                {
                echo ' '.$from.' '.'AND'.' '.$to;
                }
                else{
                echo ' '.$from.' '.'AND'.' '.date('d-m-20y', time() - 60 * 60 * 24).'<br>'.'(This list excludes todays participants)';
                }

                }
                ?></h4>
          <div style="overflow: scroll; overflow-x:hidden; height:300px; width: 700px;">
		   <table>
			  <tr style="color:red"><td>Rank</td><td>Participant Phone Number</td><td>Entries</td></tr>
			
			<?php
if(isset($_POST['today']))
{
$winnerQ=mssql_query("select TOP 100 u.numberr,COUNT(*) as count from d_questionsent d JOIN userr u on(d.user_id=u.id) and DATEADD(dd, 0, DATEDIFF(dd, 0, d.senttime)) = DATEADD(dd, 0, DATEDIFF(dd, 0,GETDATE()))and d.flag='1' 
group by u.numberr order by count desc");
}

if($_POST['date']!="")
{
$date =$_POST['date'];
$madate='20'.date('y-m-d',strtotime(str_replace('-', '/', $date)));
if($madate==$today)
{
$winnerQ=mssql_query("select TOP 100 u.numberr,COUNT(*) as count from d_questionsent d JOIN userr u on(d.user_id=u.id) AND d.senttime like '".$madate.'%'."' and d.flag='1' 
group by u.numberr order by count desc");
}
else
{
$winnerQ=mssql_query("select TOP 100 u.numberr,COUNT(*) as count from d_QuestionSentArchive d JOIN userr u on(d.user_id=u.id) AND d.senttime like '".$madate.'%'."' and d.flag='1' 
group by u.numberr order by count desc");
}
}
if(isset($_POST['weekly']))
{
$f=$_POST['from'];
$from='20'.date('y-m-d',strtotime(str_replace('-', '/', $f))). ' 00:00:01';
$t=$_POST['to'];
$to='20'.date('y-m-d',strtotime(str_replace('-', '/', $t))). ' 23:59:59';
$winnerQ=mssql_query("select TOP 100 u.numberr,COUNT(*) as count from d_QuestionSentArchive d JOIN userr u on(d.user_id=u.id) 
AND d.senttime BETWEEN '".$from."' AND '".$to."' and d.flag='1' group by u.numberr order by count desc");

        }
			   $j=1;
			  while($row=mssql_fetch_array($winnerQ))
			  {
			   $noz=$row['numberr'];
			   $no=substr($noz, -9);
			   $str='0'.$no;			       
                $str[2] = 'X';
                $str[3] = 'X';
                $str[4] = 'X';
                $str[5] = 'X';
                $str[6] = 'X';
	  echo '<tr>';
			  echo '<td>'.$j.'</td>';
			  echo '<td>'.$str.'</td>';
			   echo '<td>'.$row['count'].'</td>';
			  echo '</tr>';
			  $j=$j+1;
			  }
			  
			  ?>
			 
			  </table>
    </div>
</div>
<!-- Table -->
