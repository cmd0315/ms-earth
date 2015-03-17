<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Ms. Earth 2015 Fun Run</h2>

		<div>
			<p>Dear <strong>{{ $recipientName }}</strong>, </p>
			<p>Thank you for registering to the event!</p>
			<p>Below is you race information:</p>
			<h4>Registration Type: <span style="color:blue;">{{ e($registration->reg_type) }}</span></h4>
			<table>
				<thead>
					<tr>
						<th>Name</th>
						<th>Race Category</th>
						<th>Race Segment</th>
					</tr>
				</thead>
				<tbody>
					@foreach($registration->participants as $participant)
					<tr>
						<td>{{ $participant->name }}</td>
						<td>{{ $participant->category }}</td>
						<td>{{ $participant->segment }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@if($registration->contact_person)
			<br>
			<p><strong>Contact Person:</strong></p>
			<table cellpadding="0" cellspacing="0" border="0" align="left" width="600">
				<thead>
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Email Address</th>
						<th>Contact Number</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $registration->contact_person->name }}</td>
						<td>{{ $registration->contact_person->address }}</td>
						<td>{{ $registration->contact_person->email_address }}</td>
						<td>{{ $registration->contact_person->contact_number }}</td>
					</tr>
				</tbody>
			</table>
			@endif
			<br><br><br>
			<p>---</p>
			<p><strong>The Miss Earth 2015 Committee</strong></p>
		</div>
	</body>
</html>