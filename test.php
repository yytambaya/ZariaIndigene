<section>
  <div class="col-md-8">
    <div class="container"><h3>Apply here</h3></div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="appointment_name" class="text-black">Name of Applicant</label>
        <input type="text" name="name" class="form-control" id="appointment_name" value="<?php if(isset($v_name)) echo $v_name; ?>">
        <span class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></span>
      </div>
      <div class="form-group">
        <label for="appointment_name" class="text-black">Full Address</label>
        <input type="text" name="address" class="form-control" id="appointment_name" value="<?php if(isset($v_address)) echo $v_address; ?>">
        <span class="text-danger"><?php if(isset($address_error)) echo $address_error; ?></span>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_dat" class="text-black">Date of Birth</label>
            <input type="date" name="d_birth" class="form-control" id="appointment_dat" value="<?php if(isset($v_d_birth)) echo $v_d_birth; ?>">
            <span class="text-danger"><?php if(isset($d_birth_error)) echo $d_birth_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Place of Birth</label>
            <input type="text"  name="p_birth" class="form-control" id="appointment_name" value="<?php if(isset($v_p_birth)) echo $v_p_birth; ?>">
            <span class="text-danger"><?php if(isset($p_birth_error)) echo $p_birth_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Applicant's Passport</label>
            <input type="file"  name="passport" class="form-control-file" id="appointment_name" value="<?php if(isset($v_passport)) echo $v_passport; ?>">
            <span class="text-danger"><?php if(isset($passport_error)) echo $passport_error; ?></span>
          </div>
        </div>
        </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="appointment_name" class="text-black">Father's Name</label>
        <input type="text"  name="f_name" class="form-control" id="appointment_name" value="<?php if(isset($v_f_name)) echo $v_f_name; ?>">
        <span class="text-danger"><?php if(isset($f_name_error)) echo $f_name_error; ?></span>
      </div>
    </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Father's Tribe</label>
            <input type="text"  name="f_tribe"  class="form-control" id="appointment_name" value="<?php if(isset($v_f_tribe)) echo $v_f_tribe; ?>">
            <span class="text-danger"><?php if(isset($f_tribe_error)) echo $f_tribe_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Father's Place of Birth</label>
            <input type="text"  name="f_p_birth"  class="form-control" id="appointment_name" value="<?php if(isset($v_f_p_birth)) echo $v_f_p_birth; ?>">
            <span class="text-danger"><?php if(isset($f_p_birth_error)) echo $f_p_birth_error; ?></span>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-4">
      <div class="form-group">
        <label for="appointment_name" class="text-black">Mother's Name</label>
        <input type="text" name="m_name" class="form-control" id="appointment_name" value="<?php if(isset($v_m_name)) echo $v_m_name; ?>">
        <span class="text-danger"><?php if(isset($p_birth_error)) echo $p_birth_error; ?></span>
      </div>
      </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Mother's Tribe</label>
            <input type="text" name="m_tribe" class="form-control" id="appointment_name" value="<?php if(isset($v_m_tribe)) echo $v_m_tribe; ?>">
            <span class="text-danger"><?php if(isset($m_name_error)) echo $m_name_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Mother's Place of Birth</label>
            <input type="text"  name="m_p_birth" class="form-control" id="appointment_name" value="<?php if(isset($v_m_p_birth)) echo $v_m_p_birth; ?>">
            <span class="text-danger"><?php if(isset($m_p_birth_error)) echo $m_p_birth_error; ?></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">SCHOOL ATTENDED 1</label>
            <input type="text"  name="s_attended"  class="form-control" id="appointment_name" value="<?php if(isset($v_s_attended)) echo $v_s_attended; ?>" placeholder="Required">
            <span class="text-danger"><?php if(isset($s_attended_error)) echo $s_attended_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Certificate Type</label>
            <input type="text"  name="c_type"  class="form-control" id="appointment_name" value="<?php if(isset($v_c_type)) echo $v_c_type; ?>">
            <span class="text-danger"><?php if(isset($c_type_error)) echo $c_type_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_dat" class="text-black">Date attended </label>
            <input type="date"  name="s_date"  class="form-control" id="appointment_dat" value="<?php if(isset($v_s_date)) echo $v_s_date; ?>">
            <span class="text-danger"><?php if(isset($s_d_error)) echo $s_d_error; ?></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">SCHOOL ATTENDED 2</label>
            <input type="text"  name="s_attended2"  class="form-control" id="appointment_name" value="<?php if(isset($v_s_attended2)) echo $v_s_attended2; ?>" placeholder="Optional">
            <span class="text-danger"><?php if(isset($s_attended2_error)) echo $s_attended2_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Certificate Type</label>
            <input type="text"  name="c_type2"  class="form-control" id="appointment_name" value="<?php if(isset($v_c_type2)) echo $v_c_type2; ?>">
            <span class="text-danger"><?php if(isset($c_type2_error)) echo $c_type2_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_dat" class="text-black">Date attended</label>
            <input type="date"  name="s_date2"  class="form-control" id="appointment_dat" value="<?php if(isset($v_s_date2)) echo $v_s_date2; ?>">
            <span class="text-danger"><?php if(isset($s_d2_error)) echo $s_d2_error; ?></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">SCHOOL ATTENDED 3</label>
            <input type="text"  name="s_attended3"  class="form-control" id="appointment_name" value="<?php if(isset($v_s_attended3)) echo $v_s_attended3; ?>" placeholder="optional">
            <span class="text-danger"><?php if(isset($s_attended3_error)) echo $s_attended3_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Certificate Type</label>
            <input type="text"  name="c_type3"  class="form-control" id="appointment_name" value="<?php if(isset($v_c_type3)) echo $v_c_type3; ?>">
            <span class="text-danger"><?php if(isset($c_type3_error)) echo $c_type3_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_dat" class="text-black">Date attended</label>
            <input type="date"  name="s_date3"  class="form-control" id="appointment_dat" value="<?php if(isset($v_s_date3)) echo $v_s_date3; ?>">
            <span class="text-danger"><?php if(isset($s_d3_error)) echo $s_d3_error; ?></span>
          </div>
        </div>
      </div>

      <p><span>I certify that the above information are correct</span>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Applicant's Signature</label>
            <input type="file"  name="a_sign" class="form-control-file-border" id="appointment_name" value="<?php if(isset($v_a_sign)) echo $v_a_sign; ?>">
            <span class="text-danger"><?php if(isset($a_sign_error)) echo $a_sign_error; ?></span>
          </div>
        </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="appointment_name" class="text-black">WITNESS/GUARANTOR</label>
        <input type="text" name="wit" class="form-control" id="appointment_name" value="<?php if(isset($v_wit_name)) echo $v_wit_name; ?>">
        <span class="text-danger"><?php if(isset($wit_error)) echo $wit_error; ?></span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="appointment_name" class="text-black">Signature</label>
        <input type="file"  name="wit_sign" class="form-control-file-border" id="appointment_name" value="<?php if(isset($v_wit_sign)) echo $v_wit_sign; ?>">
        <span class="text-danger"><?php if(isset($wit_sign_error)) echo $wit_sign_error; ?></span>
      </div>
    </div>
  </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_dat" class="text-black">Date</label>
            <input type="date"  name="wit_d_sign" class="form-control" id="appointment_dat" value="<?php if(isset($v_wit_d_sign)) echo $v_wit_d_sign; ?>">
            <span class="text-danger"><?php if(isset($wit_d_sign_error)) echo $wit_d_sign_error; ?></span>
          </div>
        </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="appointment_name" class="text-black">1. Original Document Sited by</label>
        <input type="text"  name="head" class="form-control" id="appointment_name" value="<?php if(isset($v_head_name)) echo $v_head_name; ?>">
        <span class="text-danger"><?php if(isset($head_error)) echo $head_error; ?></span>
      </div>
    </div>
  </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Signature</label>
            <input type="file"  name="head_sign" class="form-control-file-border" id="appointment_name" value="<?php if(isset($v_head_sign)) echo $v_head_sign; ?>">
            <span class="text-danger"><?php if(isset($head_sign_error)) echo $head_sign_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_dat" class="text-black">Date</label>
            <input type="date" name="head_d_sign" class="form-control" id="appointment_dat" value="<?php if(isset($v_head_d_sign)) echo $v_head_d_sign; ?>">
            <span class="text-danger"><?php if(isset($head_d_sign_error)) echo $head_d_sign_error; ?></span>
          </div>
        </div>
      </div>

      <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="appointment_name" class="text-black">2. Approved by</label>
          <input type="text"  name="sec" class="form-control" id="appointment_name" value="<?php if(isset($v_sec_name)) echo $v_sec_name; ?>">
          <span class="text-danger"><?php if(isset($sec_error)) echo $sec_error; ?></span>
        </div>
      </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Signature</label>
            <input type="file"  name="sec_sign" class="form-control-file-border" id="appointment_name" value="<?php if(isset($v_sec_sign)) echo $v_sec_sign; ?>">
            <span class="text-danger"><?php if(isset($sec_sign_error)) echo $sec_sign_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_dat" class="text-black">Date</label>
            <input type="date"  name="sec_d_sign" class="form-control" id="appointment_dat" value="<?php if(isset($v_sec_d_sign)) echo $v_sec_d_sign; ?>">
            <span class="text-danger"><?php if(isset($sec_d_sign_error)) echo $sec_d_sign_error; ?></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <input name="apply" type="submit" value="Apply" class="btn btn-primary">
      </div>
    </form>
  </div>
</section>
