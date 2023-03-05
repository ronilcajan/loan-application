<div class="page-header">
    <h4 class="page-title"><?= $title ?></h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
                <i class="icon-people"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)">Borrowers</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="wizard-container wizard-round col-md-9">
        <div class="wizard-header text-center">
            <h3 class="wizard-title"><b>Register</b> New Borrowers</h3>
            <small>This information will let us know more about the customer.</small>
        </div>
        <form method="POST" action="<?= site_url('borrowers/store') ?>" enctype="multipart/form-data" id="create_customers_form">
            <div class="wizard-body">
                <div class="row">

                    <ul class="wizard-menu nav nav-pills nav-primary">
                        <li class="step" style="width: 33.3333%;">
                            <a class="nav-link active" href="#about" data-toggle="tab" aria-expanded="true"><i class="fa fa-user mr-0"></i> Borrowers Information </a>
                        </li>
                        <li class="step" style="width: 33.3333%;">
                            <a class="nav-link" href="#address" data-toggle="tab"><i class="fa fa-map-signs mr-2"></i>Borrowers Address</a>
                        </li>
                        <li class="step" style="width: 33.3333%;">
                            <a class="nav-link" href="#guarantee" data-toggle="tab"><i class="fas fa-user-shield mr-2"></i> Guarantor Information</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="about">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="info-text">Tell us who this borrower are.</h4>
                            </div>
                            <div class="col-md-4"> 
                                <div class="form-group">
                                    <label>Picture :</label>
                                    <div class="input-file input-file-image">
                                        <img class="img-upload-preview img-rounded text-center" width="200" height="200" src="<?= site_url() ?>assets/img/person.png" alt="preview">
                                        <input type="file" class="form-control form-control-file" id="uploadImg" name="avatar" accept="image/*">
                                        <label for="uploadImg" class=" label-input-file btn btn-primary">Upload a Image</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="container1">
                                    <label>Attachement :</label>
                                        <button type="button" class="btn btn-icon btn-link" onclick="addAttachment()">
											<i class="fa fa-plus"></i>
										</button>
                                        <div>
                                            <input name="attachedfile[]" accept="image/*" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First Name :</label>
                                            <input name="firstname" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Middle Name :</label>
                                            <input name="middlename" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last Name :</label>
                                            <input name="lastname" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Gender :</label>
                                            <select class="form-control" name="gender" required>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Birth Date :</label>
                                            <input name="birthdate" type="date" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Contact Number :</label>
                                            <input name="contact" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Occupation :</label>
                                            <input name="occupation" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Occupation Address :</label>
                                            <input name="occupation_address" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Remarks :</label>
                                    <textarea name="remarks" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="address">
                        <h4 class="info-text">Tell us where the borrower live.</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address 1:</label>
                                    <input name="address1" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address 2:</label>
                                    <input name="address2" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label>City :</label>
                                    <input name="city" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Province/Region :</label>
                                    <input name="province" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Zipcode :</label>
                                    <input name="zipcode" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country(optional) :</label>
                                    <input name="country" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="guarantee">
                        <h4 class="info-text">Tell us who is the borrower guarantor. </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Guarantor Name  :</label>
                                    <input name="guarantor_name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Guanrantor Address :</label>
                                    <input name="guarantor_address" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Guarantor Email  :</label>
                                    <input name="guarantor_email" type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Guanrantor Contacts :</label>
                                    <input name="guarantor_contacts" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Guarantor Occupation :</label>
                                    <input name="guarantor_occupation" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Guanrantor Occupation Address :</label>
                                    <input name="guarantor_occupation_address" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wizard-action">
                <div class="pull-left">
                    <input type="button" class="btn btn-previous btn-fill btn-black" name="previous" value="Previous">
                </div>
                <div class="pull-right">
                    <input type="button" class="btn btn-next btn-success" name="next" value="Next">
                    <input class="btn btn-finish btn-success" name="finish" value="Finish" type="submit" style="display: none;">
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
</div>