<?php
	$this->load->view('header_h');
	//print_r($result_data);
	//print_r($doctors);
?>
<div class="container fix_height pad0">

	<div class="box_title_header">
<!--		<h3 class="box_title_h">เลือกวันนัดหมาย</h3>-->
<!--		<p class="box_title_p">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หัตถการ <span class="box_title_span">--><?php //echo $this->session->userdata('select_treatment');?><!--</span> &nbsp;&nbsp;&nbsp;&nbsp;ศูนย์การรักษา <span>ศัลยกรรมตกแต่ง</span></p>-->
	</div>

	<div class="outer_cover_table">

		<div class="appointment_cover_table">

			<div class="cover_table1">
			<?php
				// Start Table1
				$tb1 = "<table class='table table-bordered tb1' id='table1'><thead><tr><th style='background:#f0efeb; border-right:none; border-left:none;'>วันที่ ".$this->common->thai_date($this->session->userdata('select_date'), 'full')."</th></tr><tr><th style='border-left:none;'>เวลา</th></tr></thead><tbody>";

				$run = 0;
				foreach( $doctors as $doctor ){

					$color = $run==0?"style='background:#f0efeb;'":"";

					$tb1 .= "<tr ".$color."><td style='border-left:none;'><div class='display_box'><figure><img src='".base_url()."/assets/upload/".$doctor->img_doctor."'></figure><div class='display_detail'><h5>".$doctor->name_doctor."</h5><p>ศัลยศาสตร์ตกแต่ง</p></div></div></td></tr>";

					$run++;
					if($run==2)$run=0;
				}

				$tb1 .= "</tbody></table>";
				echo $tb1;

			?></div><div class="cover_table2"><?php
				// Start Table2
				$tb2 = "<table class='table table-bordered tb1' id='table2'><thead><tr><th style='border-left:none; background:#f0efeb;' colspan=24></th></tr>";

				foreach( $times as $time ){
					$tb2 .= "<th>".$time."</th>";
				}

				$tb2 .= "</tr></thead><tbody>";

				$run = 0;

				$qwe = array(5,4,3,2,1);
				foreach( $doctors as $doctor ){
					$color = $run==0?"style='background:#f0efeb;'":"";
					$tb2 .= "<tr ".$color.">";

					for( $i=0; $i<sizeof($times); $i++ ){

						if( isset($result_data[$doctor->id_doctor][$times[$i]]['allot_time_start']) ){

							$tb2 .= "<td colspan=".$result_data[$doctor->id_doctor][$times[$i]]['distance_time']."><a href='".site_url('main/form_insert/'.$result_data[$doctor->id_doctor][$times[$i]]['id_appointment'])."' class='btn_blue'>ว่าง ".rand(1, 9)." คิว</a></td>";

							$i+=($result_data[$doctor->id_doctor][$times[$i]]['distance_time']-1);

						}else{
							$tb2 .= "<td></td>";
						}
					}

					$tb2 .= "</tr>";
					$run++;
					if($run==2)$run=0;
				}

				$tb2 .= "</tbody></table>";

				echo $tb2;
			?>

			</div>
		</div>

		<?php
			$str_date = strtotime($this->session->userdata('select_date'));
			$day_plus_1 = date('Y-m-d', strtotime('-1 day', $str_date));
			$day_plus_2 = $this->session->userdata('select_date');
			$day_plus_3 = date('Y-m-d', strtotime('+1 day', $str_date));
		?>

		<div class="appointment_foot_box">

<!--			<div class="calendar_box">-->
<!---->
<!--				<a href="#" class="date_btn" id="calendar_btn">-->
<!--					<i class="fa fa-calendar" aria-hidden="true"></i>-->
<!---->
<!--				</a><a href="#" class="date_btn" style="cursor:not-allowed;">-->
<!---->
<!--					--><?php //echo $this->common->thai_date($day_plus_1, 'full');?>
<!---->
<!--				</a><a href="--><?php //echo site_url('main/appointment_table/'.$day_plus_2);?><!--" class="date_btn" style="background:#b9b9b6;">-->
<!---->
<!--					--><?php //echo $this->common->thai_date($day_plus_2, 'full');?>
<!---->
<!--				</a><a href="--><?php //echo site_url('main/appointment_table/'.$day_plus_3);?><!--" class="date_btn">-->
<!---->
<!--					--><?php //echo $this->common->thai_date($day_plus_3, 'full');?>
<!--				</a>-->
<!---->
<!--			</div>-->

		</div>

	</div>

</div>




<?php $this->load->view('footer_h');?>

