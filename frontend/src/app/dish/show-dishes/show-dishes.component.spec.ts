import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ShowDishesComponent } from './show-dishes.component';

describe('ShowDishesComponent', () => {
  let component: ShowDishesComponent;
  let fixture: ComponentFixture<ShowDishesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ShowDishesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ShowDishesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
