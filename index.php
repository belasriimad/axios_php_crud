<?php 
    include('includes/header.php');
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card bg-light">
                <div class="car-body">
                    <h3 class="card-title p-2 text-center">Contacts</h3>
                    <hr>
                    <div id="message"></div>
                    <div class="p-2">
                        <div class="form-group">
                            <label for="nom">First Name*</label>
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="First Name">
                            <input type="hidden" name="id" id="id">
                        </div>
                        <div class="form-group">
                            <label for="tel">Phone*</label>
                            <input type="tel" name="tel" id="tel" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" id="addBtn">Submit</button>
                            <button class="btn btn-warning" style="display:none" id="updateBtn">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <div id="results"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include('includes/footer.php');
?>