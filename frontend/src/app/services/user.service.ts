import { Injectable } from '@angular/core';


@Injectable({
  providedIn: 'root'
})
export class UserService {

	url_login="http://127.0.0.1:8001/api/v1/auth/login";

  constructor() { }

  
}
