import { Component, OnInit } from '@angular/core';
import { StaffService } from '../service/staff.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css']
})
export class ListComponent implements OnInit {
  staffList: any = [];

  constructor(private staffService:StaffService) { }

  ngOnInit(): void {
    this.handleStaffList();
  }

  handleStaffList(){
    this.staffService.getStaffList().subscribe(res=>{
      if(res['status']=='success'){
          this.staffList = res['data'];
      }else{
          this.staffList = [];
      }
    },(error)=>{
        console.log(error);
    })
  }

}
