import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

	logo:string="Bringfood";
	login:string="Login";
	register:string="Register";

  constructor() { }

  ngOnInit(): void {
  }

}
