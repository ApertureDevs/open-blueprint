import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { Release } from '@model/domain/blueprint/release';

@Component({
  selector: 'app-release-selector',
  templateUrl: './release-selector.component.html',
})
export class ReleaseSelectorComponent implements OnInit {

  @Input() public selectedRelease: Release | null = null;
  @Input() public availableReleases!: Release[];
  @Output() public releaseChange: EventEmitter<Release> = new EventEmitter<Release>();
  public selectedReleaseTag: string | null = null;

  public ngOnInit(): void {
    this.selectedReleaseTag = this.selectedRelease !== null ? this.selectedRelease.tag : null;
  }

  public onReleaseChange(tag: string): void {
    const selectedRelease = this.availableReleases.find((availableRelease) => availableRelease.tag === tag);

    if (typeof selectedRelease === 'undefined') {
      throw new Error('Unknown release selected.');
    }
    this.selectedRelease = selectedRelease;
    this.selectedReleaseTag = this.selectedRelease !== null ? this.selectedRelease.tag : null;
    this.releaseChange.emit(selectedRelease);
  }
}
