<link rel="stylesheet" href="../assets/css/feedBack.css">
<button class="open-button btn btn-primary" onclick="openForm()">Feedback Form</button>
<div class="form-popup text-bg-info" id="feedback-area">
    <form action="../config/feedback.php" class="form-container p-4">

        <h1 class="mb-4 text-bg-light p-2">Anonymous Feedback</h1>
        <div class="form-group">
            <label for="comments"><b>Comment :</b></label>
            <textarea class="form-control" name="feedback" id="feedback" rows="4" placeholder="Enter comments if any..."
                autofocus></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger ml-2" onclick="closeForm()">Close</button>
    </form>
</div>
<!-- Bootstrap JS and jQuery CDN links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
function openForm() {
    document.getElementById("feedback-area").style.display = "block";
}

function closeForm() {
    document.getElementById("feedback-area").style.display = "none";
}
</script>