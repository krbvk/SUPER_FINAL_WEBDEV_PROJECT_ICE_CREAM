<link rel="stylesheet" href="../assets/css/feedBack.css">


<button class="open-button btn btn-primary" onclick="openForm()">Feedback</button>
<div class="form-popup text-bg-info" id="feedback-area">
    <form action="../config/feedback.php" class="form-container p-4">

        <h3 class="mb-4 text-bg-light p-2 text-center" style="font-family:'Roboto';">Anonymous Feedback</h3>

        <div class="form-group">
            <label for="comments">
                <h4 style="font-family:'Roboto'; color: #fff;"><b>Comments :</b></h4>
            </label>
            <textarea class="form-control" name="feedback" id="feedback" rows="4" placeholder="Enter comments if any..."
                autofocus>
            </textarea>
        </div>
        <button type="submit" class="btn btn-success p-2 mt-3">Submit</button>
        <button type="button" class="btn btn-danger ml-2 p-2 mt-3" onclick="closeForm()">Close</button>

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