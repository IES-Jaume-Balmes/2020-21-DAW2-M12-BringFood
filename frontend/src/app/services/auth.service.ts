import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { UserInterface } from '../models/user-interface.model';
import { BehaviorSubject, Observable } from 'rxjs';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

	url_login="http://127.0.0.1:8001/api/v1/auth/login";

  constructor(private http: HttpClient) { }

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

  //Esto es para conseguir el token
  private token: BehaviorSubject<string> = new BehaviorSubject<string>(localStorage.getItem("accessToken") || '{}');

  public token$: Observable<string> = this.token.asObservable();
}
