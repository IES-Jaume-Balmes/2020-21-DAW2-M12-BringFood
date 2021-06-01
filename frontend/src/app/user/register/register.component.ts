import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../services/auth.service';
import {Router} from '@angular/router';
import { UserInterface } from '../../models/user-interface.model';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  constructor(private authService:AuthService, private router: Router) { }

  documentsType = [
        { value: 'NIF', name: 'NIF' },
        { value: 'NIE', name: 'NIE' },
    ];

    //Este es para el usuario admin.
  documentsTypeAuthAdmin = [
        { value: 'NIF', name: 'NIF' },
        { value: 'NIE', name: 'NIE' },
        { value: 'CIF', name: 'CIF' },
    ];

  rolesId = [
      { value: 1, name: 'admin' },
      { value: 2, name: 'restaurant' },
      { value: 3, name: 'client' },
  ];

  nameErrors:Array<any>=[
  ];

  emailErrors:Array<any>=[
  ];

  passwordErrors:Array<any>=[
  ];

  documentErrors:Array<any>=[
  ];

  mobileErrors:Array<any>=[
  ];

  phoneErrors:Array<any>=[
  ];

  ngOnInit(): void {
  }

  user:UserInterface={
    id: 0,
    role_id : 3,
    name : "",
    email : "",
    password: "",
    documentType : "NIF",
    document : "",
    prefix : "+34",
    mobile : "",
    phone : ""
  }

  isAdmin(){
    if(this.authService.getCurrentUser()!=null){
      if(this.authService.getCurrentUser().role_id==1){
        return true;
      }
    }
    return false;
  }

  onRegister(): void{
    let form=this.authService.registerClient(
      this.user.name,
      this.user.email,
      this.user.password,
      this.user.documentType,
      this.user.document,
      this.user.prefix,
      this.user.mobile,
      this.user.phone,
    );
    if(this.isAdmin()){
      form=this.authService.registerUser(
        this.user.role_id,
      this.user.name,
      this.user.email,
      this.user.password,
      this.user.documentType,
      this.user.document,
      this.user.prefix,
      this.user.mobile,
      this.user.phone,
    );
    }
  	form.subscribe(
    user =>{
  		console.log(user);
  		//Redirigin a login
      if(this.authService.getCurrentUser()==null){
        this.router.navigate(["/user/login"])
      }else{
        this.router.navigate(["/user/profile"])
      }
  		
  	},
    error => {
      /*console.log(error);
      console.log(error.error.errors.password);
      console.log(this.passwordErrors.length);*/
      this.nameErrors=error.error.errors.name;
      this.passwordErrors=error.error.errors.password;
      this.emailErrors=error.error.errors.email;
      this.documentErrors=error.error.errors.document;
      this.mobileErrors=error.error.errors.mobile;
      this.phoneErrors=error.error.errors.phone;
    }
    )
  }

}
