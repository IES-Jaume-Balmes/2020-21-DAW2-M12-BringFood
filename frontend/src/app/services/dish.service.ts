import { Injectable } from '@angular/core';
import { DishInterface } from '../models/dish-interface.model';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router';
import { map } from 'rxjs/operators';
import {Observable} from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class DishService {

	url_register_dish="http://127.0.0.1:8001/api/v1/dish/save";
  url_dishes="http://127.0.0.1:8001/api/v1/dishes";

	headers: HttpHeaders = new HttpHeaders({
    "Content-Type": "application/json"
  });

  constructor(private http: HttpClient, private router: Router) { }
  /*
  registerDish(user_id:number, name: string, detail: string, img_url: any, price: number) {
    return this.http
      .post<DishInterface>(
        this.url_register_dish,
        {
          user_id,
          name,
          detail,
          img_url,
          price,
        },
        { headers: this.headers }
      )
      .pipe(map(data => data));
  }*/

  //https://www.concretepage.com/angular/angular-file-upload

  uploadWithProgress(formData: FormData): Observable<any> {
   return this.http.post(this.url_register_dish, formData, { observe: 'events',  reportProgress: true });
  }

  getDishes(){
    let header= new HttpHeaders().set('Type-content','aplication/json');
    return this.http.get(this.url_dishes,{
      headers:header
    })
  } 
}
