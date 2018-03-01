@extends('layouts.app')

@section('title')
	About | Blogsite
@endsection

@section('content')
	<div class="intro">
		<div class="intro-title flex-center text-center white-text">
			<h2 class="gaming display-1 font-bold font-up mb-2 spacing rgba-white-slight px-4 py-3 wow fadeInDown" data-wow-delay="0.2s"><strong>ABOUT</strong></h2>
			<h4 class="gaming-sub subtext-header mt-4 mb-5 wow slideInRight ml-2" data-wow-delay="0.3s">Gaming</h4>
		</div>
	</div>
	<div class="container mt-4">
		<h2 class="wow fadeIn" data-wow-delay="0.2s"><strong>About Us</strong></h2>
		<p class="wow fadeIn" data-wow-delay="0.3s">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<blockquote class="border border-warning p-2 mt-2 wow slideInLeft" data-wow-delay="0.4s">
			<p class="ml-2 text-justify"> <small> <cite> Disclaimer: No copyright infringement is inteded. This is only for educational purposes and not for profit. Some asset/s used are not owned by the developer/s unless otherwise stated; the credit goes to the owner. </cite> </small></p>
		</blockquote>
	</div>
@endsection