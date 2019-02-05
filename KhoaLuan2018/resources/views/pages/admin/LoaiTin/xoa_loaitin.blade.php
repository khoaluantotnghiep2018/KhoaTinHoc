@extends('layout/admin/index')
@section('title')
Quản trị - Tin Tức - Xóa loại tin
@endsection   

<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-edit"></i> Xóa loại tin tức</h1>
			<p>Xóa bỏ dữ liệu từ loại tin tức</p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Forms</li>
			<li class="breadcrumb-item"><a href="#">Form Components</a></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="row">
					<div class="col-lg-6">
						<form>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="exampleSelect1">Example select</label>
								<select class="form-control" id="exampleSelect1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleSelect2">Example multiple select</label>
								<select class="form-control" id="exampleSelect2" multiple="">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleTextarea">Example textarea</label>
								<textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
							</div>
							<div class="form-group">
								<label for="exampleInputFile">File input</label>
								<input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp"><small class="form-text text-muted" id="fileHelp">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
							</div>
							<fieldset class="form-group">
								<legend>Radio buttons</legend>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" id="optionsRadios1" type="radio" name="optionsRadios" value="option1" checked="">Option one is this and that—be sure to include why it's great
									</label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" id="optionsRadios2" type="radio" name="optionsRadios" value="option2">Option two can be something else and selecting it will deselect option one
									</label>
								</div>
								<div class="form-check disabled">
									<label class="form-check-label">
										<input class="form-check-input" id="optionsRadios3" type="radio" name="optionsRadios" value="option3" disabled="">Option three is disabled
									</label>
								</div>
							</fieldset>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox">Check me out
								</label>
							</div>
						</form>
					</div>
					<div class="col-lg-4 offset-lg-1">
						<form>
							<div class="form-group">
								<fieldset disabled="">
									<label class="control-label" for="disabledInput">Disabled input</label>
									<input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
								</fieldset>
							</div>
							<div class="form-group">
								<fieldset>
									<label class="control-label" for="readOnlyInput">Readonly input</label>
									<input class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly="">
								</fieldset>
							</div>
							<div class="form-group has-success">
								<label class="form-control-label" for="inputSuccess1">Valid input</label>
								<input class="form-control is-valid" id="inputValid" type="text">
								<div class="form-control-feedback">Success! You've done it.</div>
							</div>
							<div class="form-group has-danger">
								<label class="form-control-label" for="inputDanger1">Invalid input</label>
								<input class="form-control is-invalid" id="inputInvalid" type="text">
								<div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
							</div>
							<div class="form-group">
								<label class="col-form-label col-form-label-lg" for="inputLarge">Large input</label>
								<input class="form-control form-control-lg" id="inputLarge" type="text">
							</div>
							<div class="form-group">
								<label class="col-form-label" for="inputDefault">Default input</label>
								<input class="form-control" id="inputDefault" type="text">
							</div>
							<div class="form-group">
								<label class="col-form-label col-form-label-sm" for="inputSmall">Small input</label>
								<input class="form-control form-control-sm" id="inputSmall" type="text">
							</div>
							<div class="form-group">
								<label class="control-label">Input addons</label>
								<div class="form-group">
									<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text">$</span></div>
										<input class="form-control" id="exampleInputAmount" type="text" placeholder="Amount">
										<div class="input-group-append"><span class="input-group-text">.00</span></div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="tile-footer">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
			</div>
		</div>
	</div>
</main>

@section('script') 

@endsection