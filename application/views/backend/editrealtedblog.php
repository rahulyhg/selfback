<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Edit realtedblog</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editrealtedblogsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class="row">
           <div class="input-field col s12 m8">
               <?php echo form_dropdown('relatedblog', $relatedblog, set_value('relatedblog',$before->relatedblog)); ?>
                <label>Related Blog
           </div>
       </div>

       <div class="row" style="display:none">
                   <div class="input-field col s12 m8">
                       <?php echo form_dropdown('blog', $blog, set_value('blog',$before->blog)); ?>
                        <label> Product</label>
                   </div>
               </div>


<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewrelatedblog?id=").$this->input->get("productid");?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
