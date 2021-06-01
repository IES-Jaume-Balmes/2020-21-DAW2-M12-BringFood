import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../services/auth.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  logo:string="Bringfood";
  login:string="Login";
  register:string="Register";
  registerDish:string="Agregar plato";

  constructor(private authService: AuthService, private router: Router) { }

  ngOnInit(): void {
  }

  isVisibleNotAuth(){
    if(this.router.url==='/user/login' || this.router.url==='/user/register' || this.router.url==='/'){
      return true;
    }
    return false;
  }

  isVisibleAuth(){
    if(this.authService.getCurrentUser()!=null){
      return true;
    }
    return false;
  }

  isVisibleRegister(){
    if(this.router.url!='/user/login' && this.router.url!='/user/register' 
      && this.router.url!='/' && this.authService.getCurrentUser().role_id==1){
      return true;
    }
    return false;
  }

  isVisibleregisterDish(){
    if(this.router.url!='/user/login' && this.router.url!='/user/register' 
      && this.router.url!='/' && this.authService.getCurrentUser().role_id==2){
      return true;
    }
    return false;
  }

  logoutUser(){
    this.authService.logoutUser();
  }

}
