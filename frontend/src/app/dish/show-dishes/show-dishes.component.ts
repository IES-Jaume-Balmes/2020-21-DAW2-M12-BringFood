import { Component, OnInit } from '@angular/core';
import { DishService } from '../../services/dish.service';

@Component({
  selector: 'app-show-dishes',
  templateUrl: './show-dishes.component.html',
  styleUrls: ['./show-dishes.component.css']
})
export class ShowDishesComponent implements OnInit {
	public dishes:Array<any>=[]
  constructor(private dishService:DishService) { 
  	this.dishService.getDishes().subscribe((resp:any)=>{
  		console.log(resp)
  		this.dishes=resp.data;

  	})
  }

  ngOnInit(): void {
  }

}
