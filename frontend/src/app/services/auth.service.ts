import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { UserInterface } from '../models/user-interface.model';
import { BehaviorSubject, Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { Router } from '@angular/router';
//import { isNullOrUndefined } from 'util';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  url_login="http://127.0.0.1:8001/api/v1/auth/login";
  url_register="http://127.0.0.1:8001/api/v1/client/save";
  url_register_user="http://127.0.0.1:8001/api/v1/user/save";

  constructor(private http: HttpClient, private router: Router) { }

  headers: HttpHeaders = new HttpHeaders({
    "Content-Type": "application/json"
  });

  loginuser(email: string, password: string): Observable<any> {
    return this.http
      .post<UserInterface>(
        this.url_login,
        { email, password },
        { headers: this.headers }
      )
      .pipe(map(data => data));
  }

  setUser(user: UserInterface): void {
    let user_string = JSON.stringify(user);
    localStorage.setItem("currentUser", user_string);
  }

  setToken(token:any): void {
    localStorage.setItem("accessToken", token);
  }

  getToken() {
    return localStorage.getItem("accessToken");
  }

  getCurrentUser(): UserInterface {
    let user_string : any = localStorage.getItem("currentUser");
    let user: UserInterface= JSON.parse(user_string);
    return user;
  }

  logoutUser() {
    localStorage.removeItem("accessToken");
    localStorage.removeItem("currentUser");
    this.router.navigate(["/user/login"]);
  }

  registerClient(name: string, email: string, password: string, type_document: string, 
    document: string, prefix: string, mobile: string, phone: string) {
    return this.http
      .post<UserInterface>(
        this.url_register,
        {
          name,
          email,
          password,
          type_document,
          document,
          prefix,
          mobile,
          phone,
        },
        { headers: this.headers }
      )
      .pipe(map(data => data));
  }

  registerUser(role_id:number, name: string, email: string, password: string, type_document: string, 
    document: string, prefix: string, mobile: string, phone: string) {
    return this.http
      .post<UserInterface>(
        this.url_register_user,
        {
          role_id,
          name,
          email,
          password,
          type_document,
          document,
          prefix,
          mobile,
          phone,
        },
        { headers: this.headers }
      )
      .pipe(map(data => data));
  }

  //Esto es para conseguir el token
  /*
  private token: BehaviorSubject<string> = new BehaviorSubject<string>(localStorage.getItem("accessToken") || '{}');

  public token$: Observable<string> = this.token.asObservable();*/
}
