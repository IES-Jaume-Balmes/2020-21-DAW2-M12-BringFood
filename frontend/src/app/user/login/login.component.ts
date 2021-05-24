import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../services/auth.service';
import { Router } from '@angular/router';
import { UserInterface } from '../../models/user-interface.model';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private authService: AuthService, private router: Router) { }

  user:UserInterface={
  	email: "",
  	password: "",
  };

  ngOnInit(): void {
  }

  onLogin() {

      return this.authService
        .loginuser(this.user.email, this.user.password)
        .subscribe(
        data => {
          console.log(data);
          console.log(data.data.token);
          this.authService.setUser(data.data.user);
          this.authService.setToken(data.data.token);
          this.router.navigate(["/user/profile"]);
        },
        error => console.log(error)
        );

  }

}
