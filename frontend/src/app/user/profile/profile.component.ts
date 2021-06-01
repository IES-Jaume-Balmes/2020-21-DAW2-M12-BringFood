import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../services/auth.service';
import { UserInterface } from '../../models/user-interface.model';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {

  constructor(private authService: AuthService) { }

   user:UserInterface={
     id: 0,
     role_id: 0,
  	name : "",
    email : "",
    password: "",
    documentType : "",
    document : "",
    prefix : "",
    mobile : "",
    phone : ""
  };

  ngOnInit(): void {
  	this.user = this.authService.getCurrentUser();
    console.log(this.user);
    //window.location.reload();
    //refresh page
  }

}
