<?php $running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; ?>
<?php $info = base64_decode($data);?>
<?php $ex = explode("-",$info);?>
<?php $class_info = $this->db->get('class')->result_array(); ?>
<?php $sub = $this->db->get_where('subject', array('subject_id' => $ex[2]))->result_array();
foreach($sub as $row):
?>
<div class="content-w">
  <div class="conty">
  <?php include 'fancy.php';?>
  <div class="header-spacer"></div>
    <div class="cursos cta-with-media" style="background: #<?php echo $row['color'];?>;">
      <div class="cta-content">
        <div class="user-avatar">
          <img alt="" src="<?php echo base_url();?>uploads/subject_icon/<?php echo $row['icon'];?>" style="width:60px;">
        </div>
        <h3 class="cta-header"><?php echo $row['name'];?> - <small><?php echo get_phrase('study_material');?></small></h3>
        <small style="font-size:0.90rem; color:#fff;"><?php echo $this->db->get_where('class', array('class_id' => $ex[0]))->row()->name;?> "<?php echo $this->db->get_where('section', array('section_id' => $ex[1]))->row()->name;?>"</small>
      </div>
    </div>  
    <div class="os-tabs-w menu-shad">
      <div class="os-tabs-controls">
        <ul class="navs navs-tabs upper">
          <li class="navs-item">
            <a class="navs-links" href="<?php echo base_url();?>admin/subject_dashboard/<?php echo $data;?>/"><i class="os-icon picons-thin-icon-thin-0482_gauge_dashboard_empty"></i><span><?php echo get_phrase('dashboard');?></span></a>
          </li>
          <li class="navs-item">
            <a class="navs-links" href="<?php echo base_url();?>admin/online_exams/<?php echo $data;?>/"><i class="os-icon picons-thin-icon-thin-0207_list_checkbox_todo_done"></i><span><?php echo get_phrase('online_exams');?></span></a>
          </li>
          <li class="navs-item">
            <a class="navs-links" href="<?php echo base_url();?>admin/homework/<?php echo $data;?>/"><i class="os-icon picons-thin-icon-thin-0004_pencil_ruler_drawing"></i><span><?php echo get_phrase('homework');?></span></a>
          </li>
          <li class="navs-item">
            <a class="navs-links" href="<?php echo base_url();?>admin/forum/<?php echo $data;?>/"><i class="os-icon picons-thin-icon-thin-0281_chat_message_discussion_bubble_reply_conversation"></i><span><?php echo get_phrase('forum');?></span></a>
          </li>
          <li class="navs-item">
            <a class="navs-links active" href="<?php echo base_url();?>admin/study_material/<?php echo $data;?>/"><i class="os-icon picons-thin-icon-thin-0003_write_pencil_new_edit"></i><span><?php echo get_phrase('study_material');?></span></a>
          </li>
          <li class="navs-item">
            <a class="navs-links" href="<?php echo base_url();?>admin/upload_marks/<?php echo $data;?>/"><i class="os-icon picons-thin-icon-thin-0729_student_degree_science_university_school_graduate"></i><span><?php echo get_phrase('marks');?></span></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="content-i">
      <div class="content-box">
        <div class="row">
          <main class="col col-xl-12 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div id="newsfeed-items-grid">                
                <div class="element-wrapper">
                    <div class="element-box-tp">
                    <h6 class="element-header">
                    <?php echo get_phrase('study_material');?>
                    <div style="margin-top:auto;float:right;"><a href="#" data-target="#addmaterial" data-toggle="modal" class="text-white btn btn-control btn-grey-lighter btn-success"><i class="picons-thin-icon-thin-0001_compose_write_pencil_new"></i><div class="ripple-container"></div></a></div>
                    </h6>
                  <div class="table-responsive">
                    <table class="table table-padded">
                        <tbody>
                            <?php
        		            $this->db->order_by('timestamp', 'desc');
        		            $this->db->where('class_id', $ex[0]);
        		            $this->db->where('section_id', $ex[1]);
        		            $this->db->where('subject_id', $ex[2]);
        		            $study_material_info = $this->db->get('document')->result_array();
        		            foreach ($study_material_info as $row):
        	            ?>   
                            <tr>
                                <td><?php echo $row['description']?></td>
                                <td class="text-left cell-with-media ">
                                    <a href="<?php echo base_url().'uploads/document/'.$row['file_name']; ?>" style="color:gray;">
                                    <?php if($row['file_type'] == 'PDF'):?>
							            <i class="picons-thin-icon-thin-0077_document_file_pdf_adobe_acrobat" style="font-size:20px; color:gray;"></i>
						            <?php endif;?>
						            <?php if($row['file_type'] == 'Zip'):?>
							            <i class="picons-thin-icon-thin-0076_document_file_zip_archive_compressed_rar" style="font-size:20px; color:gray;"></i>
						            <?php endif;?>
						            <?php if($row['file_type'] == 'RAR'):?>
							            <i class="picons-thin-icon-thin-0076_document_file_zip_archive_compressed_rar" style="font-size:20px; color:gray;"></i>
						            <?php endif;?>
						            <?php if($row['file_type'] == 'Doc'):?>
							            <i class="picons-thin-icon-thin-0078_document_file_word_office_doc_text" style="font-size:20px; color:gray;"></i>
						            <?php endif;?>
						            <?php if($row['file_type'] == 'Image'):?>
							            <i class="picons-thin-icon-thin-0082_image_photo_file" style="font-size:20px; color:gray;"></i>
						            <?php endif;?>
						            <?php if($row['file_type'] == 'Other'):?>
    							        <i class="picons-thin-icon-thin-0111_folder_files_documents" style="font-size:20px; color:gray;"></i>
						            <?php endif;?><span><?php echo $row['file_name'];?></span><span class="smaller">(<?php echo $row['filesize'];?>)</span></a>
                                </td>                     
                                <td class="text-center bolder">
                                    <a href="<?php echo base_url().'uploads/document/'.$row['file_name']; ?>" style="color:gray;"> <span><i class="picons-thin-icon-thin-0121_download_file"></i></span> </a>
                                    <a style="color:grey;" onClick="return confirm('<?php echo get_phrase('confirm_delete');?>')" href="<?php echo base_url();?>admin/study_material/delete/<?php echo $row['document_id']?>/<?php echo $data;?>"><i class="picons-thin-icon-thin-0056_bin_trash_recycle_delete_garbage_empty"></i></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </main>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="modal fade" id="addmaterial" tabindex="-1" role="dialog" aria-labelledby="addmaterial" aria-hidden="true">
  <div class="modal-dialog window-popup edit-my-poll-popup" role="document">
    <div class="modal-content">
      <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
      </a>
      <div class="modal-body">
        <div class="ui-block-title" style="background-color:#00579c">
          <h6 class="title" style="color:white"><?php echo get_phrase('upload_study_material');?></h6>
        </div>
        <div class="ui-block-content">
        	<?php echo form_open(base_url() . 'admin/study_material/create/'.$data, array('enctype' => 'multipart/form-data')); ?>
	            <div class="row">
	                <input type="hidden" value="<?php echo $ex[0];?>" name="class_id"/>
	                <input type="hidden" value="<?php echo $ex[1];?>" name="section_id"/>
                    <input type="hidden" value="<?php echo $ex[2];?>" name="subject_id"/>
                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                		<div class="form-group">
                  			<label class="control-label"><?php echo get_phrase('description');?></label>
                  			<textarea class="form-control" rows="5" name="description"></textarea>
                		</div>
              		</div> 
              		<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                		<div class="form-group">
                  			<label class="control-label"><?php echo get_phrase('file');?></label>
                  			<input class="form-control" name="file_name" type="file">
	                	</div>
              		</div>
              		<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
              		     <div class="form-group label-floating is-select">
                        <label class="control-label"><?php echo get_phrase('file_type');?></label>
                        <div class="select">
                            <select name="file_type" required="">
                                <option value=""><?php echo get_phrase('select');?></option>
                                <option value="PDF">PDF</option>
						        <option value="Doc">Doc</option>
						        <option value="Zip">Zip</option>
						        <option value="RAR">RAR</option>
						        <option value="Image"><?php echo get_phrase('image');?></option>
						        <option value="Other"><?php echo get_phrase('other');?></option>
                            </select>
                        </div>
                    </div>
              		</div>
            	</div>
          		<div class="form-buttons-w text-right">
	             	<center><button class="btn btn-rounded btn-success btn-lg" type="submit"><?php echo get_phrase('save');?></button></center>
          		</div>
          	<?php echo form_close();?>        
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>