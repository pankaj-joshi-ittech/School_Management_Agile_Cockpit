import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './auth/login/login.component';
import { StaffComponent } from './staff/staff.component';
import { StudentComponent } from './student/student.component';

const routes: Routes = [
  {
    path:'',
    component:LoginComponent
  },
  {
    path:'login',
    component:LoginComponent
  },
  {
    path:'student',
    component: StudentComponent,
    loadChildren: () => import('./student/student.module').then(m => m.StudentModule),
    canActivate : []
  },
 
  {
    path:'staff',
    component: StaffComponent,
    loadChildren: () => import('./staff/staff.module').then(m => m.StaffModule),
    canActivate : []
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
