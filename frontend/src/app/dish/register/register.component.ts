import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../services/auth.service';
import { Router } from '@angular/router';
import { DishInterface } from '../../models/dish-interface.model';
import { DishService } from '../../services/dish.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {



  constructor(private authService:AuthService, private dishService:DishService, private router: Router) { }

  private formData = new FormData();

  ngOnInit(): void {
  }

  userIdErrors:Array<any>=[
  ];

  nameErrors:Array<any>=[
  ];

  detailErrors:Array<any>=[
  ];

  img_urlErrors:Array<any>=[
  ];

  priceErrors:Array<any>=[
  ];

  dish:DishInterface={
    user_id : this.authService.getCurrentUser().id,
    name : "",
    detail : "",
    img_url: "",
    price : 0,
  }

  isRestaurant(){
    if(this.authService.getCurrentUser()!=null){
      if(this.authService.getCurrentUser().role_id==2){
        return true;
      }
    }
    return false;
  }

  uploadImage(event: any) {

    const selectedFileList = (<HTMLInputElement>document.getElementById('img_url')).files;
    //const selectedFileList = event.target.files[0];
    if(selectedFileList!=null){
      const file = selectedFileList.item(0);
      //const file = selectedFileList[0];
      if(file!=null){
        this.formData.append("img_url", file);
      }
    }
    console.log(this.formData.get("img_url"));
  }
  
  onRegister(): void{

    this.dish.img_url=this.formData.get("img_url");
    console.log(this.dish.img_url);
    this.formData.append("user_id",(this.dish.user_id).toString());
    this.formData.append("name",this.dish.name);
    this.formData.append("detail",this.dish.detail);
    this.formData.append("price",(this.dish.price).toString());
    this.dishService.uploadWithProgress(this.formData).subscribe(event => {
      console.log(event);
      this.router.navigate(["/user/profile"]);
      /*
      if(this.authService.getCurrentUser()==null){
        this.router.navigate(["/user/login"])
      }else{
        this.router.navigate(["/user/profile"])
      }*/
    });
  }
    
    /*extraerBase64 = async ($event: any) => new Promise((resolve , reject ) : any => {
    try {
      const unsafeImg = window.URL.createObjectURL($event);
      const image = this.sanitizer.bypassSecurityTrustUrl(unsafeImg);
      const reader = new FileReader();
      reader.readAsDataURL($event);
      reader.onload = () => {
        resolve({
          base: reader.result
        });
      };
      reader.onerror = error => {
        resolve({
          base: null
        });
      };

    } catch (e) {
      return null;
    }
  })*/
}
