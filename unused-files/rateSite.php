<?php require_once 'rate-sub-pageA.php'; ?>        

<h2>What do you think about this site?</h2>
<p>
    Please rate on a scale from 1 to 5 <br />
    1= worst site ever    2=wouldn't visit again        3=not bad, might come back     4=very interesting         5=best site ever been to  
</p>
<form action="show-ratings.php" method="post">
    <label for="ddl_ratings">Rating:</label>
    <select name="ratings">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <input type="submit" value="Rate" onclick="showRatingConfirm()" /> 
    </select>
</form>

<?php require_once 'rate-sub-pageB.php'; ?>   
    


        

