<div class="comments" id="myComments">
    <h2>Kommentarer</h2> 
<?php if($this->session->userdata('logged_in')) : ?>
<?php echo form_open('recipes/create'); ?>     
     <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
     <textarea name="message" class="form-control" ></textarea>
            
     <button type="submit">Kommentera</button>


<?php echo form_close(); ?>
 <?php endif; ?>   
    
    
   
<hr>    
<?php if($comments) : ?>
    <?php foreach($comments as $comment) : ?>
    <div class="comment-box">
        <div class="comment-box-p">
        <?php echo $comment['name']; ?><br>
        <?php echo $comment['created_at']; ?><br>
        <?php echo $comment['message']; ?>
        </div>
        
        <?php if($this->session->userdata('user_id') == $comment['user_id']): ?>
        <div class="delete-form">
            <?php echo form_open('recipes/delete/'.$comment['id']); ?>
            <button type="submit" class="delete-form-button">Delete</button>
        </div>
            <?php echo form_close(); ?>
    
<?php endif; ?>
    
    </div>
    <?php endforeach; ?>
    
<?php else : ?>
    <p>No comments to display</p>
<?php endif; ?>
</div>