import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavbarComponent } from './navbar/navbar.component';
import { LoginComponent } from './user/login/login.component';
import { RegisterComponent } from './user/register/register.component';
import { ProfileComponent } from './user/profile/profile.component';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { AuthGuard } from './auth.guard';
import { RegisterComponent as DishRegisterComponent } from './dish/register/register.component';
import { ShowDishesComponent } from './dish/show-dishes/show-dishes.component';

const appRoutes = [
  {path: 'user/login', component: LoginComponent},
  {path: 'user/profile', component: ProfileComponent, canActivate: [AuthGuard]},
  {path: 'user/register', component: RegisterComponent},
  {path: 'dish/register', component: DishRegisterComponent, canActivate: [AuthGuard]},
  {path: 'dish/list', component: ShowDishesComponent, canActivate: [AuthGuard]},
 ];

@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    LoginComponent,
    RegisterComponent,
    ProfileComponent,
    DishRegisterComponent,
    ShowDishesComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    RouterModule.forRoot(appRoutes)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
