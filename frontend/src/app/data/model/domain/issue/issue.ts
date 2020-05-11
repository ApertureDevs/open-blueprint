import { Blueprint } from '@model/domain/blueprint/blueprint';
import { Label } from '@model/domain/issue/label';
import { Member } from '@model/domain/team/member';
import { User } from '@model/domain/user/user';
import { Uuid } from '@model/shared/uuid';
import { Status } from 'tslint/lib/runner';

export interface Issue {
  id: Uuid;
  from: User;
  to: Blueprint;
  reference: number;
  title: string;
  body: string;
  status: Status;
  labels: Label[];
  assignees: Member[];
  createDate: Date;
  updateDate: Date;
  closeDate: Date;
  closeBy: Member;
}
