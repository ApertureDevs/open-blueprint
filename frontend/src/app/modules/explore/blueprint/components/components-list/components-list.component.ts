import { Component, Input, OnChanges, ViewChild } from '@angular/core';
import { MatSort } from '@angular/material/sort';
import { MatTableDataSource } from '@angular/material/table';
import { Release } from '@model/domain/blueprint/release';

interface ListItem {
  quantity: number;
  description: string;
}

@Component({
  selector: 'app-components-list',
  templateUrl: './components-list.component.html',
  styleUrls: ['./components-list.component.scss'],
})
export class ComponentsListComponent implements OnChanges {

  @ViewChild(MatSort, { static: true}) public sort!: MatSort;
  @Input() public release!: Release;
  public dataSource!: MatTableDataSource<ListItem>;

  public ngOnChanges(): void {
    const list: ListItem[] = [];
    this.release.requirements.components.forEach((listItem) => {
      list.push(
        {
          quantity: listItem.quantity,
          description: listItem.component.description,
        },
      );
    });

    this.dataSource = new MatTableDataSource<ListItem>(list);
    this.dataSource.sort = this.sort;
  }
}
